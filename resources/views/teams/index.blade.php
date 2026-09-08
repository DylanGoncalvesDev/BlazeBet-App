<x-layouts::app :title="__('Gestionar Equipos')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 text-white font-sans">
        
        <div class="flex justify-between items-center bg-slate-950 border border-emerald-400 p-4 rounded-xl">
            <div>
                <h2 class="font-semibold text-xl text-white">Panel de Equipos Registrados</h2>
            </div>

            <a href="{{ route('teams.create') }}" class="shadow-[-1px_4px_0_#047857] bg-gradient-to-b from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-xs font-extrabold px-4 py-2.5 rounded-lg shadow transition">
                Registrar Equipo
            </a>
        </div>

        <div class="bg-slate-950 border border-emerald-400 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-b from-lime-300 to-emerald-400 text-white text-xs text-center font-extrabold uppercase tracking-wider">
                        <th class="p-4 w-16">ID</th>
                        <th class="p-4">Nombre</th>
                        <th class="p-4">País</th>
                        <th class="p-4">Fundación</th>
                        <th class="p-4">Tipo</th>
                        <th class="p-4">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-emerald-400 text-sm text-center">
                    @forelse($teams as $team)
                        <tr>
                            <td class="p-4 font-mono text-white">#{{ $team->id }}</td>
                            <td class="p-4 font-bold text-white">{{ $team->name }}</td>
                            <td class="p-4 text-white">{{ $team->country }}</td>
                            <td class="p-4 font-mono text-white">{{ $team->founded_at }}</td>
                            <td class="p-4 uppercase text-[11px] font-bold text-white">{{ $team->type }}</td>
                            <td class="p-4 flex justify-center gap-2.5">
                                <a href="{{ route('teams.edit', $team->id) }}" class="text-xs font-semibold bg-blue-900/30 hover:bg-blue-700/40 border border-blue-800 text-white px-3 py-1.5 rounded-md transition">
                                    Editar
                                </a>
                                <form method="POST" action="{{ route('teams.destroy', $team->id) }}" onsubmit="return confirm('¿Seguro que deseas eliminar este club?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold bg-red-700/30 hover:bg-red-700/40 border border-red-900 text-red-400 px-3 py-1.5 rounded-md transition">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center font-extrabold bg-slate-950 text-white rounded-b-xl">
                                No hay ningún equipo dado de alta. Haz clic arriba en "Registrar Equipo" para meter el primero a mano.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>