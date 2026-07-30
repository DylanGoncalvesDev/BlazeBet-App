<x-layouts::app :title="__('Modificar Predicción')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100">
        <div>
            <a href="{{ route('predictions.index') }}" class="text-xs font-medium text-zinc-400 hover:text-white transition flex items-center gap-1">
                 Volver a Mis Predicciones
            </a>
        </div>

       
        <div class="bg-slate-900 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-semibold text-lg text-white mb-1"> Cambiar Prediccion</h2>

            <form method="POST" action="{{ route('predictions.update', $predictions->id) }}" class="flex flex-col gap-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-6">
                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Goles {{ $predictions->match->homeTeam->name ?? 'Local' }}</label>
                        <input 
                            type="number" 
                            name="home_score_prediction" 
                            value="{{ $predictions->home_score_prediction }}"
                            min="0" 
                            required 
                            class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-center text-lg font-mono font-bold text-white focus:outline-none focus:border-zinc-500 transition"
                        >
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Goles {{ $predictions->match->awayTeam->name ?? 'Visita' }}</label>
                        <input 
                            type="number" 
                            name="away_score_prediction" 
                            value="{{ $predictions->away_score_prediction }}"
                            min="0" 
                            required 
                            class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-center text-lg font-mono font-bold text-white focus:outline-none focus:border-zinc-500 transition"
                        >
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Modificar Resultado General</label>
                    <select name="prediction" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="home" {{ $predictions->prediction === 'home' ? 'selected' : '' }}> Gana {{ $predictions->match->homeTeam->name ?? 'Local' }}</option>
                        <option value="away" {{ $predictions->prediction === 'away' ? 'selected' : '' }}> Gana {{ $predictions->match->awayTeam->name ?? 'Visita' }}</option>
                        <option value="draw" {{ $predictions->prediction === 'draw' ? 'selected' : '' }}> Empate</option>
                    </select>
                </div>

                
                <div class="mt-4 border-t border-zinc-800 pt-4 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-sm font-semibold px-6 py-2.5 rounded-lg shadow transition">
                         Actualizar Prediction
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
