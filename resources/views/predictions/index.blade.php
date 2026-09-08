<x-layouts::app :title="__('Mis Predicciones')">

    <div class="flex h-full w-full flex-1 flex-col gap-6 text-zinc-100">
        
        <div class="flex justify-between items-center">

            <div>
              <h2 class="font-semibold text-xl text-white"> Historial de Predicciones</h2>
            </div>
            
            <a href="{{ route('matches.index') }}" class="bg-gradient-to-br from-lime-300 to-emerald-400 shadow-[-1px_4px_0_#047857] hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-xs font-extrabold px-4 py-2 rounded-lg shadow transition">
               Ver Cartelera
            </a>

        </div>

        <form action="{{ route('predictions.filter') }}" method="GET" class="flex flex-col md:flex-row gap-4 bg-slate-950 border border-emerald-400 p-5 rounded-xl shadow-sm">
            <div class="flex-1">
                <label class="block text-xs font-semibold text-white uppercase tracking-wider mb-3">Filtrar por Estado de Apuesta</label>
                <select name="result" class="w-full bg-emerald-900/30 border border-emerald-800 rounded-lg px-3.5 py-2 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium [&>option]:bg-emerald-400">
                    <option value="" selected>Todos mis pronósticos...</option>
                    <option value="upcoming"> Partidos Próximos</option>
                    <option value="live"> Partidos En Vivo</option>
                    <option value="finished"> Partidos Terminados</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full md:w-auto bg-gradient-to-bl from-lime-300 to-emerald-400 shadow-[-1px_4px_0_#047857] hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-extrabold px-5 py-2 rounded-lg transition h-[40px] uppercase">
                     Filtrar
                </button>
            </div>
        </form>

        <div class="grid gap-6">
            @forelse($predictions as $prediction)
                <div class="bg-slate-950 border border-emerald-400 rounded-xl p-5 shadow-sm relative flex flex-col justify-between transition">
                    <div>
                      
                        <div class="flex justify-between items-center border-b border-emerald-300 pb-2">

                            <span class="text-xs font-extrabold uppercase tracking-wider text-white px-2 py-0.5">
                                {{ $prediction->match->stage ?? 'Partido' }} / {{ $prediction->match->competition->name ?? 'Competicion' }} / {{ date('d/m/Y H:i', strtotime($prediction->match->date)) }}
                            </span>
                          
                            <span class=" uppercase px-2 py-0.5 text-xs font-bold rounded-md {{ $prediction->match->status === 'live' ? 'bg-green-950 text-green-400 border border-green-900' : ($prediction->match->status === 'upcoming' ? 'bg-amber-950 text-amber-400 border border-amber-400' : 'bg-zinc-900 text-zinc-400 border border-zinc-800') }}">
                                {{ $prediction->match->status ?? 'upcoming' }}
                            </span>
                        </div>

                       
                       <div class="flex flex-row items-center justify-between w-full  p-3 rounded-lg  my-3 gap-4">
    
                         <div class="flex-1 text-left">
                            <p class="text-base font-bold text-white leading-tight uppercase tracking-wide">
                                {{ $prediction->match->homeTeam->name ?? 'Local' }}
                            </p>
                       </div>

                       <div class="flex-none flex flex-col items-center gap-1.5 min-w-[140px]">
        
                           <div class="bg-emerald-950 px-3 py-1 rounded border border-emerald-400 flex items-center justify-center min-w-[50px]">
            
                              <span class="text-emerald-400 font-bold text-xs tracking-widest uppercase">
                                   vs
                              </span>

                           </div>

                        </div>
                        <div class="flex-1 text-right">
                           <p class="text-base font-bold text-white leading-tight uppercase tracking-wide">
                               {{ $prediction->match->awayTeam->name ?? 'Visita' }}
                           </p> 
    
                        </div>

                      </div>

                        <div class="space-y-2 mt-4 bg-slate-800 p-3 rounded-lg border border-emerald-300 text-xs">
                            <h4 class="font-bold text-[10px] text-white uppercase tracking-widest border-b border-emerald-400 pb-1">Tu Pronóstico</h4>
                            <div class="flex justify-between items-center text-white">
                                <span>Goles Local:</span>
                                <span class="font-mono font-bold text-white text-sm bg-zinc-950 px-2 py-0.5 rounded border border-zinc-800">{{ $prediction->home_score_prediction }}</span>
                            </div>
                            <div class="flex justify-between items-center text-white">
                                <span>Goles Visitante:</span>
                                <span class="font-mono font-bold text-white text-sm bg-zinc-950 px-2 py-0.5 rounded border border-zinc-800">{{ $prediction->away_score_prediction }}</span>
                            </div>
                            <div class="flex justify-between items-center text-white pt-2 border-t border-emerald-400">
                                <span>Ganador elegido:</span>
                                <span class="font-bold px-2.5 py-1 rounded-md text-xs uppercase {{ $prediction->prediction === 'home' ? 'bg-blue-950 text-blue-400 border border-blue-400' : ($prediction->prediction === 'away' ? 'bg-red-950 text-red-400 border border-red-900' : 'bg-zinc-900 text-zinc-400 border border-zinc-800') }}">
                                    @if($prediction->prediction === 'home')  Local @endif
                                    @if($prediction->prediction === 'away')  Visita @endif
                                    @if($prediction->prediction === 'draw')  Empate @endif
                                </span>
                                
                            </div>
                           
                            <div class="flex justify-between items-center text-white pt-3 border-t border-emerald-400">
                                  <span>Puntos:</span>
                                  <span class="px-2.5 py-1 text-xs font-bold rounded-md bg-emerald-900 text-emerald-400 border border-emerald-400">
                                      +{{ $prediction->points ?? 0 }} PTS 
                                  </span>
                            </div>
                        </div>
                    </div>

                    
                    <div class="mt-4 pt-3 border-t border-zinc-800 flex justify-between items-center">
                
                        @if(($prediction->match->status ?? 'upcoming') === 'upcoming')

                             <a href="{{ route('predictions.edit', $prediction->id) }}" class="text-[10px] font-bold text-white hover:bg-blue-800/40 transition flex items-center bg-blue-900/20 px-2.5 py-1 rounded border border-blue-600 shadow-sm uppercase tracking-wider">
                                Editar
                             </a>

                            <form method="POST" action="{{ route('predictions.destroy', $prediction->id) }}" onsubmit="return confirm('¿Seguro que quieres retirar este pronóstico?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[10px] font-bold text-red-400 hover:bg-red-800/40 transition flex items-center gap-0.5 bg-red-950/20 px-2 py-1 rounded border border-red-600">
                                     Cancelar Apuesta
                                </button>
                            </form>
                        @else
                            <span class="text-[10px] font-bold text-zinc-600 bg-zinc-900 px-2 py-1 rounded border border-zinc-800 cursor-not-allowed">Bloqueada</span>
                        @endif
                    </div>
                </div>
            @empty
                
                <div class="col-span-full bg-slate-950 border border-emerald-400 p-12 text-center rounded-xl">
                    <p class="text-white text-sm font-medium mb-3">Aún no has realizado ninguna predicción para los partidos de la jornada.</p>
                    <a href="{{ route('matches.index') }}" class="inline-block bg-gradient-to-bl from-lime-300 to-emerald-400 shadow-[-1px_4px_0_#047857] hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-xs font-extrabold px-4 py-2 rounded-lg shadow transition">
                         Ir a la cartelera y dejar mi primer voto
                    </a>
                </div>
            @endforelse
        </div>

    </div>
</x-layouts::app>