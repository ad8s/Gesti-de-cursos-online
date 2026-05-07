<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold tracking-tight text-white">{{ $category->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <div class="p-6">
                    <p class="text-sm text-slate-400">{{ $category->slug }}</p>
                    <p class="mt-4 text-slate-200">{{ $category->description }}</p>
                    <p class="mt-4 text-sm text-slate-400">{{ __('Courses') }}: {{ $category->courses_count }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
