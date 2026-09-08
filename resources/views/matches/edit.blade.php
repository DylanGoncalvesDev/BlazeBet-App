<x-layouts::app :title="__('Cargar Marcador Oficial')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100">
        <div>
            <a href="{{ route('matches.index') }}" class="text-xs font-medium text-white hover:text-zinc-300 transition flex items-center gap-1">
                Volver a la Cartelera
            </a>
        </div>

         @if ($errors->any())
                <div class="bg-red-950/40 border border-red-900/60 text-red-400 p-3 rounded-lg text-xs font-semibold font-mono mb-4">
                    <p class="font-bold mb-1">⚠️ Error al guardar el partido:</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <div class="bg-slate-950 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-extrabold text-lg text-white mb-6">Cargar Marcador Oficial</h2>



            <form method="POST" action="{{ route('matches.update', $sportMatch->id) }}" class="flex flex-col gap-5">
                @csrf
                @method('PUT')

                <input type="hidden" name="home_team_id" value="{{ $sportMatch->home_team_id }}">
                <input type="hidden" name="away_team_id" value="{{ $sportMatch->away_team_id }}">
                <input type="hidden" name="date" value="{{ $sportMatch->date }}">
                <input type="hidden" name="competition_id" value="{{ $sportMatch->competition_id }}">
                <input type="hidden" name="location" value="{{ $sportMatch->location }}">
                <input type="hidden" name="stage" value="{{ $sportMatch->stage }}">
                <input type="hidden" name="sport" value="{{ $sportMatch->sport }}">

                <div class="grid grid-cols-2 gap-6">
                    
                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-white uppercase tracking-wider">Goles {{ $sportMatch->homeTeam->name ?? 'Local' }}</label>
                        <input 
                            type="number" 
                            name="home_team_score" 
                            value="{{ $sportMatch->home_team_score ?? 0 }}"
                            min="0" 
                            required 
                            class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-center text-lg font-mono font-extrabold text-white focus:outline-none focus:border-emerald-400 transition"
                        >
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-xs font-bold text-white uppercase tracking-wider">Goles {{ $sportMatch->awayTeam->name ?? 'Visita' }}</label>
                        <input 
                            type="number" 
                            name="away_team_score" 
                            value="{{ $sportMatch->away_team_score ?? 0 }}"
                            min="0" 
                            required 
                            class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-center text-lg font-mono font-extrabold text-white focus:outline-none focus:border-emerald-400 transition"
                        >
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-extrabold text-white uppercase tracking-wider">Estado del Partido</label>
                    <select name="status" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium">
                        <option value="upcoming" {{ $sportMatch->status === 'upcoming' ? 'selected' : '' }}> Próximo</option>
                        <option value="live" {{ $sportMatch->status === 'live' ? 'selected' : '' }}> En Vivo</option>
                        <option value="finished" {{ $sportMatch->status === 'finished' ? 'selected' : '' }}> Terminado</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="w-full shadow-[-1px_4px_0_#047857] bg-gradient-to-b from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-semibold px-6 py-2.5 rounded-lg shadow transition">
                         Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
