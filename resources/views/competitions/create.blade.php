<x-layouts::app :title="__('Registrar Competencia')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100 font-sans">
        <div>
            <a href="{{ route('competitions.index') }}" class="text-xs font-medium text-zinc-400 hover:text-white transition flex items-center gap-1">
                Volver al Listado General
            </a>
        </div>

        <div class="bg-zinc-950 border border-zinc-800 rounded-xl p-6 shadow-sm">
            <h2 class="font-semibold text-lg text-white mb-1">Registrar Nueva Competencia</h2>

            <form method="POST" action="{{ route('competitions.store') }}" class="flex flex-col gap-5">
                @csrf

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Nombre Oficial del Torneo</label>
                    <input type="text" name="name" required placeholder="Ej: UEFA Champions League, LaLiga..." class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Descripción o Detalles</label>
                    <textarea name="description" rows="3" placeholder="Ej: Temporada regular del fútbol europeo..." class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-sans"></textarea>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Fecha de Inicio</label>
                    <input type="date" name="start_date" required class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Fecha de Finalización</label>
                    <input type="date" name="end_date" required class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 tracking-wider uppercase">Estado de la Liga</label>
                    <select name="status" required class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="not_started" selected>No Iniciada</option>
                        <option value="in_progress">En Progreso</option>
                        <option value="finished">Finalizada</option>
                    </select>
                </div>

                <div class="mt-4 border-t border-zinc-800 pt-4 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-sm font-semibold px-6 py-2.5 rounded-lg shadow transition">
                        Guardar Torneo
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>


