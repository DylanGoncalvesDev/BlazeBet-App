<x-layouts::app :title="__('Editar Equipo')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100">
        <div>
            <a href="{{ route('teams.index') }}" class="text-xs font-medium text-zinc-400 hover:text-white transition flex items-center gap-1">
                Volver al Listado
            </a>
        </div>

        <div class="bg-slate-900 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-semibold text-lg text-white mb-1">Modificar Equipo</h2>

            <form method="POST" action="{{ route('teams.update', $team->id) }}" class="flex flex-col gap-5">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Nombre del Club</label>
                    <input type="text" name="name" value="{{ $team->name }}" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Pais</label>
                    <input type="text" name="logo" value="{{ $team->country }}" class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Fecha de Fundacion</label>
                    <input type="text" name="logo" value="{{ $team->founded_at }}" class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Nombre de la imagen del Escudo</label>
                    <input type="text" name="logo" value="{{ $team->logo }}" class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="mt-4 border-t border-zinc-800 pt-4 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-sm font-semibold px-6 py-2.5 rounded-lg shadow transition">
                        Actualizar Equipo
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>