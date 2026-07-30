<x-layouts::app :title="__('Registrar Equipo')">
    <div class="max-w-xl mx-auto flex flex-col gap-6 w-full flex-1 text-zinc-100 font-sans">
        <div>
            <a href="{{ route('teams.index') }}" class="text-xs font-medium text-zinc-400 hover:text-white transition flex items-center gap-1">
                Volver al Listado General
            </a>
        </div>

        <div class="bg-slate-900 border border-emerald-400 rounded-xl p-6 shadow-sm">
            <h2 class="font-semibold text-lg text-white mb-1">Registrar Nuevo Equipo</h2>

            <form method="POST" action="{{ route('teams.store') }}" class="flex flex-col gap-5">
                @csrf

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Nombre Oficial</label>
                    <input type="text" name="name" required placeholder="Ej: Real Madrid, Barcelona..." class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">País de Origen</label>
                    <input type="text" name="country" required placeholder="Ej: España, Argentina..." class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>
            
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Año de Fundación</label>
                    <input type="number" name="founded_at" required min="1800" max="2026" placeholder="Ej: 1902" class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>
              
                <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Tipo de Equipo</label>
                    <select name="type" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
                        <option value="" disabled selected>Selecciona una opción...</option>
                        <option value="club">Club Profesional</option>
                        <option value="national">Selección Nacional</option>
                    </select>
                </div>

                 <div class="flex flex-col gap-1.5">
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Deporte al que Pertenece</label>
                    <select name="sport" required class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition font-medium">
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
                    <label class="text-xs font-bold text-white uppercase tracking-wider">Nombre del Archivo del Escudo (Opcional)</label>
                    <input type="text" name="logo" placeholder="Ej: madrid.png" class="w-full bg-slate-500 border border-emerald-400 rounded-lg px-4 py-2.5 text-sm text-white focus:outline-none focus:border-zinc-500 transition">
                </div>

                <div class="mt-4 border-t border-zinc-800 pt-4 flex justify-end">
                    <button type="submit" class="w-full md:w-auto bg-zinc-100 hover:bg-zinc-200 text-zinc-950 text-sm font-semibold px-6 py-2.5 rounded-lg shadow transition">
                         Guardar Equipo
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
