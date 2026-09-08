<x-layouts::app :title="__('Editar Equipo')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100">
        <div>
            <a href="{{ route('teams.index') }}" class="text-xs font-medium text-white hover:text-zinc-300 transition flex items-center gap-1">
                Volver al Listado
            </a>
        </div>

        <div class="bg-slate-950 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-extrabold text-lg text-white mb-6">Modificar Equipo</h2>

            <form method="POST" action="{{ route('teams.update', $team->id) }}" class="flex flex-col gap-5">
                @csrf
                @method('PUT')
                
                <input type="hidden" name="type" value="{{ $team->type }}">
                <input type="hidden" name="sport" value="{{ $team->sport }}">

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-extrabold text-white uppercase tracking-wider">Nombre del Club</label>
                    <input type="text" name="name" value="{{ $team->name }}" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Pais</label>
                    <input type="text" name="country" value="{{ $team->country }}" class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Fecha de Fundacion</label>
                    <input type="text" name="founded_at" value="{{ $team->founded_at }}" class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Nombre de la imagen del Escudo</label>
                    <input type="text" name="logo" value="{{ $team->logo }}" class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

                <div>
                    <button type="submit" class="w-full shadow-[-1px_4px_0_#047857] bg-gradient-to-bl from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition">
                        Actualizar Equipo
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>