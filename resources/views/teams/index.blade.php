<x-layouts::app :title="__('Gestionar Equipos')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 text-white font-sans">
        
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-white">Panel de Equipos Registrados</h2>
            </div>

            <a href="{{ route('teams.create') }}" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-xs font-bold px-4 py-2.5 rounded-lg shadow transition">
                Registrar Equipo
            </a>
        </div>

        <div class="bg-slate-900 border border-emerald-400 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-500 border border-emerald-400 text-xs font-bold uppercase tracking-wider">
                        <th class="p-4 w-16">ID</th>
                        <th class="p-4">Nombre</th>
                        <th class="p-4">País</th>
                        <th class="p-4">Fundación</th>
                        <th class="p-4">Tipo</th>
                        <th class="p-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-emerald-400 text-sm">
                    @forelse($teams as $team)
                        <tr class="hover:bg-slate-500 transition">
                            <td class="p-4 font-mono text-white">#{{ $team->id }}</td>
                            <td class="p-4 font-bold text-white">{{ $team->name }}</td>
                            <td class="p-4 text-zinc-300">{{ $team->country }}</td>
                            <td class="p-4 font-mono text-white">{{ $team->founded_at }}</td>
                            <td class="p-4 uppercase text-[11px] font-bold text-white">{{ $team->type }}</td>
                            <td class="p-4 text-right flex justify-end gap-2.5">
                                <a href="{{ route('teams.edit', $team->id) }}" class="text-xs font-semibold bg-zinc-900 hover:bg-zinc-800 border border-zinc-800 text-zinc-300 px-3 py-1.5 rounded-md transition">
                                    Editar
                                </a>
                                <form method="POST" action="{{ route('teams.destroy', $team->id) }}" onsubmit="return confirm('¿Seguro que deseas eliminar este club?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold bg-red-700/30 hover:bg-red-900/40 border border-red-900/50 text-red-400 px-3 py-1.5 rounded-md transition">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center font-medium border-dashed bg-slate-500 border border-emerald-400 rounded-b-xl">
                                No hay ningún equipo dado de alta. Haz clic arriba en "Registrar Equipo" para meter el primero a mano.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>