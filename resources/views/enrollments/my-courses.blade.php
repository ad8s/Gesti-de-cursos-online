<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold tracking-tight text-white">{{ __('My courses') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <div class="p-6">
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        @forelse ($courses as $course)
                            <article class="rounded-3xl border border-white/10 bg-slate-900/40 p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-300">{{ $course->category?->name ?? 'General' }}</p>
                                <h3 class="mt-3 text-lg font-semibold text-white">{{ $course->title }}</h3>
                                <p class="mt-2 text-sm text-slate-300">{{ $course->description }}</p>
                                <div class="mt-4 flex items-center justify-end text-sm text-slate-400">
                                    <a href="{{ route('courses.show', $course) }}" class="font-medium text-cyan-300 hover:text-white">Open</a>
                                </div>
                            </article>
                        @empty
                            <div class="rounded-3xl border border-dashed border-white/15 p-8 text-slate-400">
                                {{ __('You are not enrolled in any course yet.') }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
