<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen" style="background-image: url('{{ asset('background.jpg') }}');">
        <flux:sidebar sticky collapsible="mobile" class="border-e border-emerald-400 bg-slate-950">

            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav>

            @if(auth()->user()->role !== 'admin')
                <flux:sidebar.group  class="grid">
        
                    <flux:sidebar.item icon="calendar" :href="route('matches.index')" :current="request()->routeIs('matches.index')">
                        {{ __('Cartelera de Partidos') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="arrow-trending-up" :href="route('predictions.index')" :current="request()->routeIs('predictions.index')">
                        {{ __('Mis Predicciones') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="trophy" :href="route('predictions.ranking')" :current="request()->routeIs('predictions.ranking')">
                        {{ __('Ranking') }}
                    </flux:sidebar.item>
          
                </flux:sidebar.group>
            @endif

                @if(auth()->check() && auth()->user()->role === 'admin')
                    <flux:sidebar.group class="grid mt-4 pt-2">
                        
                    <flux:sidebar.item icon="plus" :href="route('admin.matches.index')" :current="request()->routeIs('admin.matches.index')">
                        {{ __('Gestionar Partidos') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="shield-check" :href="route('teams.index')" :current="request()->routeIs('teams.index')">
                        {{ __('Gestionar Equipos') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="trophy" :href="route('competitions.index')" :current="request()->routeIs('competitions.index')">
                        {{ __('Gestionar Competencias') }}
                    </flux:sidebar.item>

                    </flux:sidebar.group>
                @endif
            </flux:sidebar.nav>



            <flux:spacer />

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

       
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu class="bg-gradient-to-b from-lime-300 to-emerald-400">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate >
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full ">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @persist('toast')
            <flux:toast.group>
                <flux:toast />
            </flux:toast.group>
        @endpersist

        @fluxScripts
    </body>
</html>