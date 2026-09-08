<x-layouts::app :title="__('Realizar Predicción')">
    <div class="max-w-3xl mx-auto flex flex-col gap-8 w-full flex-1">
        
        <div>
            <a href="{{ route('dashboard') }}" class="text-xs font-medium text-white hover:text-zinc-300 transition flex items-center gap-1">
                Volver a la Cartelera
            </a>
        </div>

        <div class="bg-slate-950 border border-emerald-400 rounded-xl  shadow-sm">
            <div class="text-left border-b border-emerald-400 p-1">
                <div class="text-xs font-extrabold p-2 uppercase tracking-widest text-white">
                    {{ $sportMatch->stage }}
                </div>
            </div>

           
            <div class="flex items-center justify-between my-4">
            
                <div class="flex flex-col items-center flex-1 text-center">
                    <span class="text-4xl mb-2"></span>
                    <p class="font-bold text-base text-white">{{ $sportMatch->homeTeam->name ?? 'Local' }}</p>
                    <span class="text-[10px] uppercase font-extrabold text-blue-400 tracking-wider mt-1">Local</span>
                </div>

                
                <div class="px-4 flex flex-col items-center"> 
                    <span class="text-xs font-black mt-5 bg-emerald-950 text-emerald-400 px-3 py-1.5 rounded-lg border border-emerald-400">VS</span>
                    <p class="text-[12px] text-white mt-3 font-mono font-extrabold">{{ $sportMatch->location ?? 'Estadio por definir' }} {{ $sportMatch->date }} </p>
                   
                </div>

               
                <div class="flex flex-col items-center flex-1 text-center">
                    <span class="text-4xl mb-2"></span>
                    <p class="font-extrabold text-base text-white">{{ $sportMatch->awayTeam->name ?? 'Visita' }}</p>
                    <span class="text-[10px] uppercase font-extrabold text-red-400 tracking-wider mt-1">Visitante</span>
                </div>
            </div>
        </div>

        <div class="bg-slate-950 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h3 class="font-extrabold text-lg text-white mb-2">Introduce tu Pronóstico</h3>

            <form method="POST" action="{{ route('predictions.store') }}" class="flex flex-col gap-6">
                @csrf

                <input type="hidden" name="match_id" value="{{ $sportMatch->id }}">

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-xs font-extrabold text-white uppercase tracking-wider">Goles {{ $sportMatch->homeTeam->name ?? 'Local' }}</label>
                        <input 
                            type="number" 
                            name="home_score_prediction" 
                            min="0" 
                            required 
                            placeholder="0" 
                            class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-3 text-center text-lg font-mono text-white focus:outline-none focus:border-emerald-400 transition"
                        >
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-xs font-extrabold text-white uppercase tracking-wider">Goles {{ $sportMatch->awayTeam->name ?? 'Visita' }}</label>
                        <input 
                            type="number" 
                            name="away_score_prediction" 
                            min="0" 
                            required 
                            placeholder="0" 
                            class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-3 text-center text-lg font-mono font-bold text-white focus:outline-none focus:border-emerald-400 transition"
                        >
                    </div>
                </div>

                <div class="flex flex-col gap-2 mt-2">
                    <label class="text-xs font-extrabold text-white uppercase tracking-wider">Predicción del Resultado General</label>
                    <select name="prediction" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium">
                        <option value="">Selecciona una opción...</option>
                        <option value="home"> Gana {{ $sportMatch->homeTeam->name ?? 'Local' }}</option>
                        <option value="away"> Gana {{ $sportMatch->awayTeam->name ?? 'Visita' }}</option>
                        <option value="draw"> Empate</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full shadow-[-1px_4px_0_#047857] bg-gradient-to-b from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-extrabold px-6 py-3 rounded-lg shadow transition">
                         Guardar mi Apuesta
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-layouts::app>
