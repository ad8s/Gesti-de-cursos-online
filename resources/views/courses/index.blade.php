<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} - Courses</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-950 text-slate-100 antialiased">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.18),_transparent_34%),linear-gradient(180deg,_#0f172a_0%,_#020617_100%)]">
            <header class="border-b border-white/10 bg-slate-950/70 backdrop-blur">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                    <a href="{{ route('courses.index') }}" class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-300">Cursos</a>
                    <div class="flex items-center gap-3 text-sm">
                        @auth
                            <a href="{{ route('dashboard') }}" class="rounded-full border border-white/10 px-4 py-2 text-slate-200 transition hover:border-cyan-400/50 hover:text-white">Dashboard</a>
                            <a href="{{ route('my-courses') }}" class="rounded-full border border-white/10 px-4 py-2 text-slate-200 transition hover:border-cyan-400/50 hover:text-white">My courses</a>
                            <a href="{{ route('courses.create') }}" class="rounded-full bg-cyan-400 px-4 py-2 font-semibold text-slate-950 transition hover:bg-cyan-300">New course</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-full border border-white/10 px-4 py-2 text-slate-200 transition hover:border-cyan-400/50 hover:text-white">Log in</a>
                            <a href="{{ route('register') }}" class="rounded-full bg-cyan-400 px-4 py-2 font-semibold text-slate-950 transition hover:bg-cyan-300">Register</a>
                        @endauth
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <p class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-300">Sistema de gestió de cursos</p>
                    <h1 class="mt-4 text-4xl font-semibold tracking-tight text-white sm:text-5xl">All courses in one place</h1>
                    <p class="mt-4 text-lg text-slate-300">Browse the catalog, open a course, and enroll when you are ready.</p>
                </div>

                @if (session('status'))
                    <div class="mt-8 rounded-2xl border border-cyan-400/20 bg-cyan-400/10 px-4 py-3 text-cyan-100">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    @forelse ($courses as $course)
                        <article class="rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-300">{{ $course->category?->name ?? 'General' }}</p>
                                    <h2 class="mt-3 text-2xl font-semibold text-white">{{ $course->title }}</h2>
                                </div>
                                <span class="rounded-full border border-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-300">{{ $course->level }}</span>
                            </div>
                            <p class="mt-4 line-clamp-3 text-sm leading-6 text-slate-300">{{ $course->description }}</p>
                            <div class="mt-6 flex flex-wrap items-center gap-3 text-sm text-slate-300">
                                <span>{{ $course->owner?->name }}</span>
                                <span>·</span>
                                <span>{{ $course->students_count ?? $course->students->count() }} students</span>
                            </div>
                            <div class="mt-6 flex items-center justify-between gap-3">
                                <span class="text-sm text-slate-400">{{ optional($course->starts_at)->format('d M Y') }}</span>
                                <a href="{{ route('courses.show', $course) }}" class="rounded-full bg-white px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-200">Open</a>
                            </div>
                        </article>
                    @empty
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-8 text-slate-300 md:col-span-2 xl:col-span-3">
                            No courses yet.
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
    </body>
</html>
