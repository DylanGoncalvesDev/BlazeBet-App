<x-layouts::app.sidebar :title="$title ?? null">
    <flux:main>

        @if(session('success'))
            <div class="bg-emerald-950/40 border border-emerald-900/60 text-emerald-400 p-3 rounded-lg text-xs font-semibold font-mono mb-4 shadow-sm flex items-center gap-2">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('danger'))
            <div class="bg-red-950/40 border border-red-900/60 text-red-400 p-3 rounded-lg text-xs font-semibold font-mono mb-4 shadow-sm flex items-center gap-2">
                <span>{{ session('danger') }}</span>
            </div>
        @endif

         @if ($errors->any())
            <div class="bg-red-950/40 border border-red-900/60 text-red-400 p-3 rounded-lg text-xs font-semibold font-mono mb-4 shadow-sm">
                <p class="font-bold mb-1.5 flex items-center gap-1">"Errors were found in the form:</p>
                <ul class="list-disc list-inside text-[11px] text-red-300/90 flex flex-col gap-1 pl-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </flux:main>
</x-layouts::app.sidebar>
