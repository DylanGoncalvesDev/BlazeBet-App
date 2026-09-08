<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenido - PyroBet</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-emerald-950 text-zinc-100 antialiased font-sans" style="background-image: url('{{ asset('background.jpg') }}');">
       
        <header class="relative w-full bg-slate-950 border-b border-emerald-400 px-6 py-4 flex justify-between items-center shadow-sm">
            <x-app-logo></x-app-logo>
           
            <div class="flex gap-4 text-sm font-medium">
                <a href="{{ route('login') }}" class="shadow-[-1px_4px_0_#047857] font-extrabold text-white px-4 py-2 bg-gradient-to-br from-lime-300 to-emerald-400 hover:opacity-90 rounded-lg pt-2 transition">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="shadow-[-1px_4px_0_#047857] text-white bg-gradient-to-bl from-lime-300 to-emerald-400 px-4 py-2 rounded-lg hover:opacity-90 transition font-extrabold ">Registrarse</a>
            </div>
        </header>

        <div class="py-12 px-6 max-w-7xl mx-auto w-full">
            <h2 class="font-extrabold text-2xl mb-8 text-white"> Partidos Disponibles de la Jornada</h2>

            <div class="grid grid-cols-1 gap-6">
                @forelse($matches as $match)
                    <div class="bg-slate-950 border border-emerald-400 rounded-xl p-5 shadow-sm flex flex-col justify-between transition">
                        <div>
                            <div class="flex justify-between items-center mb-4 border-b border-emerald-400 pb-2">
                                <span class="text-xs font-bold uppercase text-white">{{ $match->stage }}</span>
                                <span class="px-2 py-0.5 text-[11px] font-medium rounded-md uppercase {{ $match->status === 'upcoming' ? 'bg-amber-700 text-amber-300 border border-amber-300' : ($match->status === 'live' ? 'bg-green-950 text-green-400 border border-green-900' : 'bg-zinc-900 text-zinc-400 border border-zinc-800') }}">
                                    {{ $match->status }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between my-4">
                                <div class="flex flex-col items-center flex-1 text-center">
                                    <span class="text-xl mb-1"></span>
                                    <p class="font-extrabold text-xl text-white leading-tight">{{ $match->homeTeam->name ?? 'Local' }}</p>
                                </div>
                                <div class="flex flex-col items-center px-2">
                                    <span class="text-[10px] font-bold bg-emerald-950 border border-emerald-400 text-emerald-400 px-2 py-1 rounded">VS</span>
                                    <p class="text-[15px] text-white mt-1.5 text-center font-medium">{{ $match->date }}</p>
                                </div>
                                <div class="flex flex-col items-center flex-1 text-center">
                                    <span class="text-xl mb-1"></span>
                                    <p class="font-extrabold text-xl text-white leading-tight">{{ $match->awayTeam->name ?? 'Visita' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-emerald-400">
                            <a href="{{ route('login') }}" class="block w-full text-center shadow-[-1px_4px_0_#047857] text-white bg-gradient-to-bl from-lime-300 to-emerald-400 hover:opacity-90 font-extrabold py-2.5 rounded-lg transition shadow">
                                 Inicia sesión para Votar
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full border border-emerald-400 p-12 text-center rounded-xl bg-slate-950">
                        <p class="text-lg font-medium">No hay partidos programados en la base de datos en este momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </body>
</html>
