<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $category->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">
                <div class="p-6">
                    <p class="text-sm text-gray-500">{{ $category->slug }}</p>
                    <p class="mt-4 text-gray-700">{{ $category->description }}</p>
                    <p class="mt-4 text-sm text-gray-500">{{ __('Courses') }}: {{ $category->courses_count }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
