<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-slate-950" style="background-image: url('{{ asset('background.jpg') }}');">
        <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="flex w-full max-w-sm flex-col gap-7">
                <a href="{{ route('home') }}" class="flex flex-col items-center font-medium" wire:navigate>
                    <span class="flex h-9 w-9 mb-1 items-center justify-center rounded-md">
                        <x-app-logo-icon class="size-12 object-contain" />
                    </span>
                    <span class="drop-shadow-[0_2px_0_rgba(60,150,90,1)] text-2xl font-bold bg-gradient-to-b from-lime-300 to-emerald-400 bg-clip-text text-transparent">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <div class="flex flex-col">
                    {{ $slot }}
                </div>
            </div>
        </div>

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>
