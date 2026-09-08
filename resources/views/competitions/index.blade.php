<x-layouts::app :title="__('Gestionar Competencias')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 text-zinc-100 font-sans">
        
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-white"> Ligas y Torneos Configurados</h2>
            </div>
           
            <a href="{{ route('competitions.create') }}" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-xs font-bold px-4 py-2.5 rounded-lg shadow transition">
                 Registrar Competencia
            </a>
        </div>

        <div class="bg-zinc-950 border border-zinc-800 rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-zinc-800 bg-zinc-900/50 text-xs font-bold uppercase tracking-wider text-zinc-400">
                        <th class="p-4 w-16">ID</th>
                        <th class="p-4">Nombre de la Liga</th>
                        <th class="p-4">Inicio</th>
                        <th class="p-4">Finalización</th>
                        <th class="p-4">Estado</th>
                        <th class="p-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-800 text-sm">
                    @forelse($competitions as $competition)
                        <tr class="hover:bg-zinc-900/30 transition">
                            <td class="p-4 font-mono text-zinc-500">#{{ $competition->id }}</td>
                            <td class="p-4 font-bold text-white">{{ $competition->name }}</td>
                            <td class="p-4 font-mono text-zinc-400">{{ $competition->start_date }}</td>
                            <td class="p-4 font-mono text-zinc-400">{{ $competition->end_date }}</td>
                            <td class="p-4">
                                <span class="px-2 py-0.5 text-[11px] font-bold rounded-md {{ $competition->status === 'in_progress' ? 'bg-green-950 text-green-400 border border-green-900' : ($competition->status === 'not_started' ? 'bg-amber-950 text-amber-400 border border-amber-900' : 'bg-zinc-900 text-zinc-400 border border-zinc-800') }}">
                                    {{ $competition->status }}
                                </span>
                            </td>
                            <td class="p-4 text-right flex justify-end gap-2.5">
                                <a href="{{ route('competitions.edit', $competition->id) }}" class="text-xs font-semibold bg-zinc-900 hover:bg-zinc-800 border border-zinc-800 text-zinc-300 px-3 py-1.5 rounded-md transition">
                                    Editar
                                </a>
                                <form method="POST" action="{{ route('competitions.destroy', $competition->id) }}" onsubmit="return confirm('¿Seguro que deseas borrar esta liga?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-semibold bg-red-950/30 hover:bg-red-900/40 border border-red-900/50 text-red-400 px-3 py-1.5 rounded-md transition">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-zinc-500 font-medium border-dashed border-2 border-zinc-800 rounded-b-xl">
                                No hay ninguna competencia registrada. Haz clic arriba en "Registrar Competencia" para abrir el formulario manual.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts::app>

