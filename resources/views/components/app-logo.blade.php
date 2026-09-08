@props([
    'sidebar' => false,
])

@if($sidebar)
    <div class="flex items-center gap-3 h-10">
      <div class="relative w-12 h-10 flex items-center">
         <x-app-logo-icon class="absolute top-1/2 -translate-y-1/2 left-0 size-13 object-contain block z-10" />
      </div>

      <span class="drop-shadow-[0_2px_0_rgba(60,150,90,1)] text-2xl font-bold bg-gradient-to-b from-lime-300 to-emerald-400 bg-clip-text text-transparent">
            {{ config('app.name', 'Laravel') }}
      </span>
    </div>
@else
    <div class="flex items-center gap-3 h-10">
      <div class="relative w-12 h-10 flex items-center">
         <x-app-logo-icon class="absolute top-1/2 -translate-y-1/2 left-0 size-13 object-contain block z-10" />
      </div>

      <span class="drop-shadow-[0_2px_0_rgba(60,150,90,1)] text-2xl font-bold bg-gradient-to-b from-lime-300 to-emerald-400 bg-clip-text text-transparent">
            {{ config('app.name', 'Laravel') }}
      </span>
    </div>
@endif
