<x-layouts::app :title="__('Cartelera de Partidos')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 text-zinc-100">
        
        <h2 class="font-semibold text-xl text-white">
            
        </h2>

        <form action="{{ route('matches.filter') }}" method="GET" class="flex flex-col md:flex-row gap-4 bg-slate-950 border border-emerald-400 p-5 rounded-xl shadow-sm w-full">
            
            <div class="flex-1">
                <label class="block text-xs font-semibold text-white uppercase tracking-wider mb-1.5">Buscar Equipo</label>
                <input type="text" name="search_team" value="{{ request('search_team') }}" placeholder="Ej: Real Madrid, Barcelona..." class="w-full bg-emerald-900/30 border border-emerald-800 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
            </div>
            
            <div class="w-full md:w-48">
                <label class="block text-xs font-semibold text-white uppercase tracking-wider mb-1.5">Fecha Específica</label>
                <input type="date" name="specific_date" value="{{ request('specific_date') }}" class="w-full bg-emerald-900/30 border border-emerald-800 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
            </div>

            <div class="flex items-end gap-2.5 w-full md:w-auto">

                <button type="submit" class="flex-1 md:flex-none bg-gradient-to-bl from-lime-300 to-emerald-400 shadow-[-1px_4px_0_#047857] hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-extrabold px-3.5 py-2 rounded-lg shadow transition tracking-wider whitespace-nowrap uppercase">
                    filtrar
                </button>

                @if(request('search_team') || request('specific_date'))
                    <a href="{{ route('matches.index') }}" class="flex-1 md:flex-none text-center  bg-gradient-to-br from-lime-300 to-emerald-400 shadow-[-1px_4px_0_#047857] hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-semibold px-3.5 py-2 rounded-lg transition tracking-wider whitespace-nowrap flex items-center justify-center uppercase">
                        limpiar
                    </a>
                @endif

            </div>
        </form>

        
        <div class="flex flex-col gap-4 w-full">
            @forelse($matches as $match)
                <div class="bg-slate-950 border border-emerald-400 rounded-xl p-5 shadow-sm relative flex flex-col justify-between transition">
                    <div>
                        <div class="flex justify-between items-center mb-4 border-b border-emerald-400 pb-2">
                            <span class="text-xs font-extrabold uppercase tracking-wider text-white">{{ $match->stage }} - {{ $match->competition->name ?? 'COMPETENCIA' }}</span>
                            <span class="px-2 py-0.5 text-[11px] font-extrabold rounded-md uppercase {{ $match->status === 'upcoming' ? 'bg-amber-700 text-amber-300 border border-amber-300' : ($match->status === 'live' ? 'bg-green-950 text-green-400 border border-green-900' : 'bg-zinc-900 text-zinc-400 border border-zinc-800') }}">
                                {{ $match->status }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between my-4">
                            <div class="flex flex-col items-center flex-1 text-center">
                                <span class="text-xl mb-1"></span>
                                <p class="font-extrabold text-xl text-white leading-tight">{{ $match->homeTeam->name ?? 'Local' }}</p>
                            </div>

                            <div class="flex flex-col items-center px-2">
                                <span class="text-[10px] font-bold bg-emerald-950 border border-emerald-400 text-emerald-400 px-2 py-1 rounded">VS</span>
                                <p class="text-[15px] text-white mt-1.5 text-center font-extrabold">{{ $match->date }}</p>
                            </div>

                            <div class="flex flex-col items-center flex-1 text-center">
                                <span class="text-xl mb-1"></span>
                                <p class="font-extrabold text-xl text-white leading-tight">{{ $match->awayTeam->name ?? 'Visita' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-t border-emerald-400">
                        <a href="{{ route('matches.show', $match->id) }}" class="block w-full text-center shadow-[-1px_4px_0_#047857] bg-gradient-to-b from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white font-semibold py-2.5 rounded-lg transition">
                             Ver Detalles y Votar
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-slate-950 border border-emerald-400 p-12 text-center rounded-xl">
                    <p class="text-white text-sm font-medium">No hay partidos programados en la base de datos.</p>
                </div>
            @endforelse
        </div>

    </div>
</x-layouts::app>