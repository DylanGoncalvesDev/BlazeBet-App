<x-layouts::app :title="__('Ranking Global')">
    <div class="max-w-4xl mx-auto flex flex-col gap-5 w-full flex-1 text-zinc-100 font-sans">
        
        <div class="bg-zinc-950 p-4 border border-zinc-800 rounded-xl shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
            <div>
                <h2 class="font-black text-lg text-white tracking-wide uppercase font-mono">Salón de la Fama - BLAZEBET</h2>

            </div>
            <div class="bg-zinc-900 border border-zinc-800 px-4 py-2 rounded-lg text-center min-w-[130px]">
                <span class="block text-[9px] uppercase font-bold text-zinc-500 tracking-wider font-mono">Top Jugadores</span>
                <span class="text-xs font-black text-emerald-400 font-mono">{{ $users->count() }} Competidores</span>
            </div>
        </div>

        <div class="bg-zinc-950 border border-zinc-800 rounded-xl overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-zinc-800 bg-zinc-900/40 text-[10px] uppercase font-bold text-zinc-400 tracking-widest font-mono">
                            <th class="py-3 px-5 w-16 text-center">Puesto</th>
                            <th class="py-3 px-4">Usuario / Jugador</th>
                            <th class="py-3 px-4">Correo Electrónico</th>
                            <th class="py-3 px-5 text-right w-36">Puntos Totales</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-900 text-xs text-zinc-300 font-medium">
                        @forelse($users as $index => $user)
                            @php
                                $position = $index + 1;
                            @endphp

                            <tr class="hover:bg-zinc-900/20 transition {{ auth()->id() === $user->id ? 'bg-zinc-900/40 border-y border-zinc-800' : '' }}">
                                
                                 <td class="py-3.5 px-5 text-center font-mono font-black">
                                    @if($position === 1)
                                        <span class="inline-flex items-center justify-center size-6 bg-amber-400/10 text-amber-400 border border-amber-400/30 rounded-full text-xs">1</span>
                                    @elseif($position === 2)
                                        <span class="inline-flex items-center justify-center size-6 bg-zinc-300/10 text-zinc-300 border border-zinc-300/30 rounded-full text-xs">2</span>
                                    @elseif($position === 3)
                                        <span class="inline-flex items-center justify-center size-6 bg-amber-700/10 text-amber-600 border border-amber-700/30 rounded-full text-xs">3</span>
                                    @else
                                        <span class="text-zinc-500 font-bold">#{{ $position }}</span>
                                    @endif
                                </td>

                                <td class="py-3.5 px-4 font-bold text-zinc-100 flex items-center gap-2">
                                    <span class="uppercase tracking-wide">{{ $user->name }}</span>
                                    @if(auth()->id() === $user->id)
                                        <span class="text-[9px] font-black font-mono text-emerald-400 bg-emerald-950/40 border border-emerald-900/40 px-1.5 py-0.5 rounded uppercase">Tú</span>
                                    @endif
                                </td>

                                <td class="py-3.5 px-4 font-mono text-zinc-500">{{ $user->email }}</td>

                                <td class="py-3.5 px-5 text-right font-mono font-black text-sm text-emerald-400">
                                    {{ $user->total_points ?? 0 }} <span class="text-[9px] font-bold text-zinc-600 uppercase ml-0.5 font-sans">PTS</span>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-12 text-center text-zinc-500 font-medium border-dashed border border-zinc-900 rounded-b-xl">
                                    No hay registros de puntuación disponibles en la base de datos de SQLite.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layouts::app>