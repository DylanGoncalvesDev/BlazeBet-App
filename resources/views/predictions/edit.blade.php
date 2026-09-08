<x-layouts::app :title="__('Modificar Predicción')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100">
        <div>
            <a href="{{ route('predictions.index') }}" class="text-xs font-medium text-white hover:text-zinc-300 transition flex items-center gap-1">
                 Volver a Mis Predicciones
            </a>
        </div>

       
        <div class="bg-slate-950 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-semibold text-lg text-white mb-1"> Cambiar Prediccion</h2>

            <form method="POST" action="{{ route('predictions.update', $predictions->id) }}" class="flex flex-col gap-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-6">
                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-extrabold text-white uppercase tracking-wider">Goles {{ $predictions->match->homeTeam->name ?? 'Local' }}</label>
                        <input 
                            type="number" 
                            name="home_score_prediction" 
                            value="{{ $predictions->home_score_prediction }}"
                            min="0" 
                            required 
                            class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-center text-lg font-extrabold text-white focus:outline-none focus:border-emerald-400 transition"
                        >
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-extrabold text-white uppercase tracking-wider">Goles {{ $predictions->match->awayTeam->name ?? 'Visita' }}</label>
                        <input 
                            type="number" 
                            name="away_score_prediction" 
                            value="{{ $predictions->away_score_prediction }}"
                            min="0" 
                            required 
                            class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-center text-lg font-extrabold text-white focus:outline-none focus:border-emerald-400 transition"
                        >
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-extrabold text-white uppercase tracking-wider">Modificar Resultado General</label>
                    <select name="prediction" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium">
                        <option value="home" {{ $predictions->prediction === 'home' ? 'selected' : '' }}> Gana {{ $predictions->match->homeTeam->name ?? 'Local' }}</option>
                        <option value="away" {{ $predictions->prediction === 'away' ? 'selected' : '' }}> Gana {{ $predictions->match->awayTeam->name ?? 'Visita' }}</option>
                        <option value="draw" {{ $predictions->prediction === 'draw' ? 'selected' : '' }}> Empate</option>
                    </select>
                </div>

                
                <div>
                    <button type="submit" class="w-full shadow-[-1px_4px_0_#047857] bg-gradient-to-b from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow transition">
                         Actualizar Prediction
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
