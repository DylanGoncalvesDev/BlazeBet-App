<x-layouts::app :title="__('Programar Partido')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-white font-sans">
        <div>
            <a href="{{ route('matches.index') }}" class="text-xs font-medium text-zinc-400 hover:text-white transition flex items-center gap-1">
                Volver a la Cartelera
            </a>
        </div>

        <div class="bg-slate-900 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-semibold text-lg text-white mb-3">Programar Nuevo Partido</h2>

            <form method="POST" action="{{ route('matches.store') }}" class="flex flex-col gap-5">
                @csrf


                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Equipo Local</label>
                    <select name="home_team_id" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="" disabled selected>Selecciona el club de casa...</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }} ({{ $team->country }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Equipo Visitante</label>
                    <select name="away_team_id" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="" disabled selected>Selecciona el club visitante...</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }} ({{ $team->country }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Asociar Torneo / Competencia</label>
                    <select name="competition_id" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="" disabled selected>Selecciona la liga oficial...</option>
                        @foreach($competitions as $competition)
                            <option value="{{ $competition->id }}"> {{ $competition->name }} ({{ $competition->status }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Fecha y Hora del Partido</label>
                    <input type="datetime-local" name="date" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Estadio / Ubicación</label>
                    <input type="text" name="location" required placeholder="Ej: Estadio Santiago Bernabéu" class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

            
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold  uppercase tracking-wider">Fase / Jornada</label>
                    <input type="text" name="stage" required placeholder="Ej: Jornada 1" class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold uppercase tracking-wider">Deporte</label>
                    <select name="sport" required class="w-full bg-slate-500 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="" disabled selected>Selecciona una opción...</option>
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
                    <select name="status" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="upcoming" selected> Próximo (Upcoming)</option>
                        <option value="live"> En Vivo (Live)</option>
                        <option value="finished"> Terminado (Finished)</option>
                    </select>
                </div>

                <input type="hidden" name="home_team_score" value="0">
                <input type="hidden" name="away_team_score" value="0">

                <div class="mt-4 border-t border-zinc-800 pt-4 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-sm font-semibold px-6 py-2.5 rounded-lg shadow transition">
                         Crear Partido
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>

