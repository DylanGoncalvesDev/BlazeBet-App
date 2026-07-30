<x-layouts::app :title="__('Realizar Predicción')">
    <div class="max-w-3xl mx-auto flex flex-col gap-8 w-full flex-1">
        
        <div>
            <a href="{{ route('dashboard') }}" class="text-xs font-medium text-neutral-500 hover:text-neutral-900 dark:hover:text-white transition flex items-center gap-1">
                Volver a la Cartelera
            </a>
        </div>

        <div class="bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-700 rounded-xl p-6 shadow-sm">
            <div class="text-center border-b border-neutral-100 dark:border-neutral-800 pb-4 mb-6">
                <span class="text-xs font-bold uppercase tracking-widest text-zinc-500 dark:text-neutral-400">
                    {{ $sportMatch->stage }}
                </span>
                <h3 class="text-sm text-neutral-400 mt-1"> {{ $sportMatch->location ?? 'Estadio por definir' }}</h3>
            </div>

           
            <div class="flex items-center justify-between my-4">
            
                <div class="flex flex-col items-center flex-1 text-center">
                    <span class="text-4xl mb-2"></span>
                    <p class="font-bold text-base text-neutral-900 dark:text-neutral-100">{{ $sportMatch->homeTeam->name ?? 'Local' }}</p>
                    <span class="text-[10px] uppercase font-bold text-zinc-400 tracking-wider mt-1">Local</span>
                </div>

                
                <div class="px-4 flex flex-col items-center">
                    <span class="text-xs font-black bg-neutral-100 dark:bg-neutral-800 text-neutral-600 dark:text-neutral-400 px-3 py-1.5 rounded-lg border border-neutral-200 dark:border-neutral-700">VS</span>
                    <p class="text-[10px] text-neutral-400 mt-3 font-mono font-medium">{{ $sportMatch->date }}</p>
                </div>

               
                <div class="flex flex-col items-center flex-1 text-center">
                    <span class="text-4xl mb-2"></span>
                    <p class="font-bold text-base text-neutral-900 dark:text-neutral-100">{{ $sportMatch->awayTeam->name ?? 'Visita' }}</p>
                    <span class="text-[10px] uppercase font-bold text-zinc-400 tracking-wider mt-1">Visitante</span>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-700 rounded-xl p-6 shadow-sm">
            <h3 class="font-semibold text-lg text-neutral-900 dark:text-white mb-2">Introduce tu Pronóstico</h3>
            <p class="text-xs text-neutral-400 mb-6">Escribe cuántos goles crees que anotará cada equipo. ¡Clava el marcador exacto para llevarte los 6 puntos completos!</p>

            <form method="POST" action="{{ route('predictions.store') }}" class="flex flex-col gap-6">
                @csrf

                <input type="hidden" name="match_id" value="{{ $sportMatch->id }}">

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label class="text-xs font-bold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider">Goles {{ $sportMatch->homeTeam->name ?? 'Local' }}</label>
                        <input 
                            type="number" 
                            name="home_score_prediction" 
                            min="0" 
                            required 
                            placeholder="0" 
                            class="w-full bg-neutral-50 dark:bg-neutral-950 border border-neutral-200 dark:border-neutral-800 rounded-lg px-4 py-3 text-center text-lg font-mono font-bold text-neutral-900 dark:text-neutral-100 focus:outline-none focus:border-zinc-500 transition"
                        >
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-xs font-bold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider">Goles {{ $sportMatch->awayTeam->name ?? 'Visita' }}</label>
                        <input 
                            type="number" 
                            name="away_score_prediction" 
                            min="0" 
                            required 
                            placeholder="0" 
                            class="w-full bg-neutral-50 dark:bg-neutral-950 border border-neutral-200 dark:border-neutral-800 rounded-lg px-4 py-3 text-center text-lg font-mono font-bold text-neutral-900 dark:text-neutral-100 focus:outline-none focus:border-zinc-500 transition"
                        >
                    </div>
                </div>

                <div class="flex flex-col gap-2 mt-2">
                    <label class="text-xs font-bold text-neutral-700 dark:text-neutral-300 uppercase tracking-wider">Predicción del Resultado General</label>
                    <select name="prediction" required class="w-full bg-neutral-50 dark:bg-neutral-950 border border-neutral-200 dark:border-neutral-800 rounded-lg px-4 py-3 text-sm text-neutral-900 dark:text-neutral-100 focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="" disabled selected>Selecciona una opción...</option>
                        <option value="home"> Gana {{ $sportMatch->homeTeam->name ?? 'Local' }}</option>
                        <option value="away"> Gana {{ $sportMatch->awayTeam->name ?? 'Visita' }}</option>
                        <option value="draw"> Empate</option>
                    </select>
                </div>

                <div class="mt-4 border-t border-neutral-100 dark:border-neutral-800 pt-4 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-zinc-900 dark:bg-neutral-100 hover:bg-zinc-800 dark:hover:bg-neutral-200 text-white dark:text-zinc-900 text-sm font-semibold px-6 py-3 rounded-lg shadow transition transform active:scale-95 duration-150">
                         Guardar mi Apuesta
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-layouts::app>
