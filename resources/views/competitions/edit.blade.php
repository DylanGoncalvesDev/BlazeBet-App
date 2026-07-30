<x-layouts::app :title="__('Editar Competencia')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100">
        <div>
            <a href="{{ route('competitions.index') }}" class="text-xs font-medium text-zinc-400 hover:text-white transition flex items-center gap-1">
                Volver al Listado
            </a>
        </div>

        <div class="bg-zinc-950 border border-zinc-800 rounded-xl p-6 shadow-sm">
            <h2 class="font-semibold text-lg text-white mb-1"> Modificar Competencia</h2>
            <p class="text-xs text-zinc-400 mb-6">Cambia los parámetros de la liga o copa seleccionada.</p>

            <form method="POST" action="{{ route('competitions.update', $competition->id) }}" class="flex flex-col gap-5">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Nombre del Torneo</label>
                    <input type="text" name="name" value="{{ $competition->name }}" required class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Fecha de Inicio</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $competition->start_date) }}" class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

               
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Fecha de Finalización</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $competition->end_date) }}" class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>


                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-zinc-300 uppercase tracking-wider">Estado del Torneo</label>
                    <select name="status" required class="w-full bg-zinc-900 border border-zinc-800 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium font-sans">
                        <option value="not_started" selected>No Iniciado</option>
                        <option value="in_progress">En Progreso</option>
                        <option value="finished">Terminado</option>
                    </select>
                </div>

                <div class="mt-4 border-t border-zinc-800 pt-4 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-sm font-semibold px-6 py-2.5 rounded-lg shadow transition">
                         Actualizar Competencia
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
