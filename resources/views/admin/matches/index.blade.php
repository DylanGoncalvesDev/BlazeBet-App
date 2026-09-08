<x-layouts::app :title="__('Panel de Control - Partidos')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 text-zinc-100 font-sans">
        
        <div class="flex justify-between items-center bg-slate-950 p-4 border border-emerald-400 rounded-xl">
            <div>
                <h2 class="font-bold text-xl text-white">Panel de Gestión de Partidos</h2>
            </div>
            <a href="{{ route('matches.create') }}" class="shadow-[-1px_4px_0_#047857] bg-gradient-to-b from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-xs font-extrabold px-4 py-2.5 rounded-lg shadow transition uppercase tracking-wider">
                 Programar Partido
            </a>
        </div>

      

        <div class="bg-slate-950 border border-emerald-400 rounded-xl overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-emerald-400 bg-gradient-to-b from-lime-300 to-emerald-400 text-[10px] uppercase font-bold text-white tracking-widest font-mono">
                            <th class="py-3 px-4 w-12">ID</th>
                            <th class="py-3 px-4">Deporte</th>
                            <th class="py-3 px-4">Torneo / Liga</th>
                            <th class="py-3 px-4">Partido (Vs)</th>
                            <th class="py-3 px-4 text-center">Marcador</th>
                            <th class="py-3 px-4">Fecha / Hora</th>
                            <th class="py-3 px-4 text-center">Estado</th>
                            <th class="py-3 px-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-400 text-xs text-white font-medium">
                        @forelse($matches as $match)
                            <tr>
                                <td class="py-3.5 px-4 font-extrabold">#{{ $match->id }}</td>
                                <td class="py-3.5 px-4 uppercase text-[10px] font-extrabold">{{ $match->sport }}</td>
                                <td class="py-3.5 px-4 font-extrabold">{{ $match->competition->name ?? 'Sin Liga' }}</td>
                                <td class="py-3.5 px-4 font-extrabold text-white uppercase tracking-wide">
                                    {{ $match->homeTeam->name ?? 'Local' }} <span class="font-normal text-[10px]">VS</span> {{ $match->awayTeam->name ?? 'Visita' }}
                                </td>
                                <td class="py-3.5 px-4 text-center font-mono font-black text-sm text-white">
                                    {{ $match->home_team_score }} - {{ $match->away_team_score }}
                                </td>
                                <td class="py-3.5 px-4 font-extrabold">{{ date('d/m/Y H:i', strtotime($match->date)) }}</td>
                                <td class="py-3.5 px-4 text-center">
                                    <span class="text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded font-mono {{ $match->status === 'live' ? 'bg-green-950 text-green-400 border border-green-900' : ($match->status === 'upcoming' ? 'bg-amber-950 text-amber-400 border border-amber-900' : 'bg-zinc-900 text-zinc-400 border border-zinc-800') }}">
                                        {{ $match->status }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                       
                                        <a href="{{ route('matches.edit', $match->id) }}" class="text-[10px] font-bold text-white hover:bg-blue-800/40 bg-blue-900/20 border border-blue-800 px-2.5 py-1 rounded shadow-sm transition uppercase tracking-wider">
                                            Editar
                                        </a>

                            
                                        <form method="POST" action="{{ route('matches.destroy', $match->id) }}" onsubmit="return confirm('¿Seguro que deseas eliminar permanentemente este partido de SQLite?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[10px] font-bold text-red-400 hover:bg-red-800/40 bg-red-900/20 border border-red-800 px-2.5 py-1 rounded transition uppercase tracking-wider">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-8 text-center text-white font-medium rounded-b-xl">
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