<x-layouts::app :title="__('Programar Partido')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-white font-sans">
        <div>
            <a href="{{ route('matches.index') }}" class="text-xs font-medium text-white hover:text-zinc-300 transition flex items-center gap-1">
                Volver a la Cartelera
            </a>
        </div>

        <div class="bg-slate-950 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-extrabold text-lg text-white mb-3">Programar Nuevo Partido</h2>

            <form method="POST" action="{{ route('matches.store') }}" class="flex flex-col gap-5">
                @csrf


                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Equipo Local</label>
                    <select name="home_team_id" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium">
                        <option value="">Selecciona el club de casa...</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }} ({{ $team->country }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Equipo Visitante</label>
                    <select name="away_team_id" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium">
                        <option value="">Selecciona el club visitante...</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }} ({{ $team->country }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Asociar Torneo / Competencia</label>
                    <select name="competition_id" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium">
                        <option value="">Selecciona la liga oficial...</option>
                        @foreach($competitions as $competition)
                            <option value="{{ $competition->id }}"> {{ $competition->name }} ({{ $competition->status }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Fecha y Hora del Partido</label>
                    <input type="datetime-local" name="date" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Estadio / Ubicación</label>
                    <input type="text" name="location" required placeholder="Ej: Estadio Santiago Bernabéu" class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

            
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold  uppercase tracking-wider">Fase / Jornada</label>
                    <input type="text" name="stage" required placeholder="Ej: Jornada 1" class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Deporte</label>
                    <select name="sport" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium">
                        <option value="">Selecciona una opción...</option>
                        <option value="soccer football">Futbol </option>
                        <option value="futsal">Futbol Sala</option>
                        <option value="basketball">Baloncesto</option>
                        <option value="baseball">Beisbol</option>
                        <option value="volleyball">Voleibol</option>
                        <option value="handball">Balonmano</option>
                        <option value="rugby">Rugby</option>
                        <option value="american football">Futbol Americano</option>
                        <option value="hockey">Hockey</option>
                        <option value="softball">sofbol</option>
                        <option value="cricket">Cricket</option>
                    </select>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold tracking-wider uppercase">Estado Inicial</label>
                    <select name="status" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium">
                        <option value="upcoming" selected> Próximo (Upcoming)</option>
                        <option value="live"> En Vivo (Live)</option>
                        <option value="finished"> Terminado (Finished)</option>
                    </select>
                </div>

                <input type="hidden" name="home_team_score" value="0">
                <input type="hidden" name="away_team_score" value="0">

                <div>
                    <button type="submit" class="w-full shadow-[-1px_4px_0_#047857] bg-gradient-to-bl from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition">
                         Crear Partido
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>

