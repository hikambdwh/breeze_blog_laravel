<x-layout :title="$title">
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            <div class="flex gap-2">
                @for ($i = 1; $i <= 10; $i++)
                    @if ($i % 2 == 0)
                        <div class="bg-green-500 text-white w-8 h-8 place-items-center grid">{{ $i }}</div>
                    @endif
                @endfor
            </div>
        </div>
    </main>
</x-layout>
