<x-app-layout>
    <x-slot name="header">
        <div class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-300">{{ __('Dashboard') }}</p>
            <h1 class="mt-4 text-4xl font-semibold tracking-tight text-white sm:text-5xl">{{ __('Overview') }}</h1>
            <p class="mt-4 text-lg text-slate-300">{{ __('Your site overview and quick stats.') }}</p>
        </div>
    </x-slot>

    <div class="space-y-6 py-12">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 sm:px-6 lg:grid-cols-4 lg:px-8">
            <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <p class="text-sm font-medium text-slate-400">{{ __('Courses') }}</p>
                <p class="mt-2 text-3xl font-semibold text-white">{{ $coursesCount }}</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <p class="text-sm font-medium text-slate-400">{{ __('Categories') }}</p>
                <p class="mt-2 text-3xl font-semibold text-white">{{ $categoriesCount }}</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <p class="text-sm font-medium text-slate-400">{{ __('My courses') }}</p>
                <p class="mt-2 text-3xl font-semibold text-white">{{ $enrolledCoursesCount }}</p>
            </div>
            <div class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <p class="text-sm font-medium text-slate-400">{{ __('Users') }}</p>
                <p class="mt-2 text-3xl font-semibold text-white">{{ $usersCount }}</p>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-[2rem] border border-white/10 bg-white/5 p-6 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-white">{{ __('Quick actions') }}</h3>
                        <p class="mt-1 text-sm text-slate-400">{{ __('Jump to the main areas of the application.') }}</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('courses.index') }}" class="inline-flex items-center rounded-full border border-white/10 px-4 py-2 text-sm font-medium text-slate-200 transition hover:border-cyan-400/50 hover:text-white">
                            {{ __('Browse courses') }}
                        </a>
                        <a href="{{ route('my-courses') }}" class="inline-flex items-center rounded-full bg-cyan-400 px-4 py-2 text-sm font-medium text-slate-950 transition hover:bg-cyan-300">
                            {{ __('My courses') }}
                        </a>
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center rounded-full border border-white/10 px-4 py-2 text-sm font-medium text-slate-200 transition hover:border-cyan-400/50 hover:text-white">
                            {{ __('Profile') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
