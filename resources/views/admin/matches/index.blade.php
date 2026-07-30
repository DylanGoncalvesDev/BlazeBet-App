<x-layouts::app :title="__('Panel de Control - Partidos')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 text-zinc-100 font-sans">
        
        <div class="flex justify-between items-center bg-slate-900 p-4 border border-emerald-400 rounded-xl">
            <div>
                <h2 class="font-bold text-xl text-white">Panel de Gestión de Partidos</h2>
            </div>
            <a href="{{ route('matches.create') }}" class="bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-xs font-bold px-4 py-2.5 rounded-lg shadow transition uppercase tracking-wider">
                 Programar Partido
            </a>
        </div>

      

        <div class="bg-slate-900 border border-emerald-400 rounded-xl overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-zinc-800 bg-slate-600/50 text-[10px] uppercase font-bold text-white tracking-widest font-mono">
                            <th class="py-3 px-4 w-12">ID</th>
                            <th class="py-3 px-4">Deporte</th>
                            <th class="py-3 px-4">Torneo / Liga</th>
                            <th class="py-3 px-4">Partido (Vs)</th>
                            <th class="py-3 px-4 text-center">Marcador Real</th>
                            <th class="py-3 px-4">Fecha / Hora</th>
                            <th class="py-3 px-4 text-center">Estado</th>
                            <th class="py-3 px-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-900 text-xs text-white font-medium">
                        @forelse($matches as $match)
                            <tr class="hover:bg-zinc-900/30 transition">
                                <td class="py-3.5 px-4 font-mono font-bold">#{{ $match->id }}</td>
                                <td class="py-3.5 px-4 uppercase text-[10px] font-mono">{{ $match->sport }}</td>
                                <td class="py-3.5 px-4 font-semibold">{{ $match->competition->name ?? 'Sin Liga' }}</td>
                                <td class="py-3.5 px-4 font-bold text-white uppercase tracking-wide">
                                    {{ $match->homeTeam->name ?? 'Local' }} <span class="font-normal text-[10px]">VS</span> {{ $match->awayTeam->name ?? 'Visita' }}
                                </td>
                                <td class="py-3.5 px-4 text-center font-mono font-black text-sm text-emerald-400">
                                    {{ $match->home_team_score }} - {{ $match->away_team_score }}
                                </td>
                                <td class="py-3.5 px-4 font-mono">{{ date('d/m/Y H:i', strtotime($match->date)) }}</td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded font-mono {{ $match->status === 'live' ? 'bg-green-950 text-green-400 border border-green-900' : ($match->status === 'upcoming' ? 'bg-amber-950 text-amber-400 border border-amber-900' : 'bg-zinc-900 text-zinc-400 border border-zinc-800') }}">
                                        {{ $match->status }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                       
                                        <a href="{{ route('matches.edit', $match->id) }}" class="text-[10px] font-bold text-zinc-300 hover:text-white bg-zinc-900 border border-zinc-800 px-2.5 py-1 rounded shadow-sm transition uppercase tracking-wider">
                                            Editar
                                        </a>

                            
                                        <form method="POST" action="{{ route('matches.destroy', $match->id) }}" onsubmit="return confirm('¿Seguro que deseas eliminar permanentemente este partido de SQLite?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[10px] font-bold text-red-400 hover:text-red-300 bg-red-700/20 border border-red-900/30 px-2.5 py-1 rounded transition uppercase tracking-wider">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-8 text-center text-zinc-500 font-medium border-dashed border border-zinc-900 rounded-b-xl">
                                    No hay partidos agendados en la base de datos todavía.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts::app>