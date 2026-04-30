<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:grid-cols-4 lg:px-8">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-gray-500">{{ __('Courses') }}</p>
                <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $coursesCount }}</p>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-gray-500">{{ __('Categories') }}</p>
                <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $categoriesCount }}</p>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-gray-500">{{ __('My courses') }}</p>
                <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $enrolledCoursesCount }}</p>
            </div>
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <p class="text-sm font-medium text-gray-500">{{ __('Users') }}</p>
                <p class="mt-2 text-3xl font-semibold text-gray-900">{{ $usersCount }}</p>
            </div>
        </div>

        <div class="mx-auto mt-6 max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">{{ __('Quick actions') }}</h3>
                        <p class="mt-1 text-sm text-gray-500">{{ __('Jump to the main areas of the application.') }}</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('courses.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                            {{ __('Browse courses') }}
                        </a>
                        <a href="{{ route('my-courses') }}" class="inline-flex items-center rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">
                            {{ __('My courses') }}
                        </a>
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                            {{ __('Profile') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
