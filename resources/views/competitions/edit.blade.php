<x-layouts::app :title="__('Editar Competencia')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100">
        <div>
            <a href="{{ route('competitions.index') }}" class="text-xs font-medium text-white hover:text-zinc-300 transition flex items-center gap-1">
                Volver al Listado
            </a>
        </div>

        <div class="bg-slate-950 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-extrabold text-lg text-white mb-6"> Modificar Competencia</h2>

            <form method="POST" action="{{ route('competitions.update', $competition->id) }}" class="flex flex-col gap-5">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Nombre del Torneo</label>
                    <input type="text" name="name" value="{{ $competition->name }}" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Fecha de Inicio</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $competition->start_date) }}" class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>

               
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Fecha de Finalización</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $competition->end_date) }}" class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition">
                </div>


                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Estado del Torneo</label>
                    <select name="status" required class="w-full bg-emerald-950 border border-emerald-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-emerald-400 transition font-medium font-sans">
                        <option value="not_started" selected>No Iniciado</option>
                        <option value="in_progress">En Progreso</option>
                        <option value="finished">Terminado</option>
                    </select>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="w-full shadow-[-1px_4px_0_#047857] bg-gradient-to-b from-lime-300 to-emerald-400 hover:from-lime-300/80 hover:to-emerald-400/80 text-white text-sm font-extrabold px-6 py-2.5 rounded-lg shadow transition">
                         Actualizar Competencia
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
