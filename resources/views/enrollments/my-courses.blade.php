<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('My courses') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">
                <div class="p-6">
                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        @forelse ($courses as $course)
                            <article class="rounded-2xl border border-gray-200 p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-700">{{ $course->category?->name ?? 'General' }}</p>
                                <h3 class="mt-3 text-lg font-semibold text-gray-900">{{ $course->title }}</h3>
                                <p class="mt-2 text-sm text-gray-600">{{ $course->description }}</p>
                                <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                                    <span>{{ $course->owner?->name }}</span>
                                    <a href="{{ route('courses.show', $course) }}" class="font-medium text-cyan-700 hover:text-cyan-900">Open</a>
                                </div>
                            </article>
                        @empty
                            <div class="rounded-2xl border border-dashed border-gray-300 p-8 text-gray-500">
                                {{ __('You are not enrolled in any course yet.') }}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
