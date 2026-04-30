<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $course->title }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-950 text-slate-100 antialiased">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(34,211,238,0.22),_transparent_28%),linear-gradient(180deg,_#0f172a_0%,_#020617_100%)]">
            <header class="border-b border-white/10 bg-slate-950/70 backdrop-blur">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                    <a href="{{ route('courses.index') }}" class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-300">Cursos</a>
                    <div class="flex items-center gap-3 text-sm">
                        @auth
                            <a href="{{ route('dashboard') }}" class="rounded-full border border-white/10 px-4 py-2 text-slate-200 transition hover:border-cyan-400/50 hover:text-white">Dashboard</a>
                            <a href="{{ route('my-courses') }}" class="rounded-full border border-white/10 px-4 py-2 text-slate-200 transition hover:border-cyan-400/50 hover:text-white">My courses</a>
                        @else
                            <a href="{{ route('login') }}" class="rounded-full border border-white/10 px-4 py-2 text-slate-200 transition hover:border-cyan-400/50 hover:text-white">Log in</a>
                            <a href="{{ route('register') }}" class="rounded-full bg-cyan-400 px-4 py-2 font-semibold text-slate-950 transition hover:bg-cyan-300">Register</a>
                        @endauth
                    </div>
                </div>
            </header>

            <main class="mx-auto max-w-5xl px-4 py-14 sm:px-6 lg:px-8">
                @if (session('status'))
                    <div class="mb-8 rounded-2xl border border-cyan-400/20 bg-cyan-400/10 px-4 py-3 text-cyan-100">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-8 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                    <div class="flex flex-wrap items-start justify-between gap-6">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-cyan-300">{{ $course->category?->name ?? 'General' }}</p>
                            <h1 class="mt-3 text-4xl font-semibold tracking-tight text-white">{{ $course->title }}</h1>
                            <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-300">{{ $course->description }}</p>
                        </div>
                        <span class="rounded-full border border-white/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.2em] text-slate-200">{{ $course->level }}</span>
                    </div>

                    <dl class="mt-8 grid gap-4 text-sm text-slate-300 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="rounded-2xl border border-white/10 bg-slate-900/40 p-4">
                            <dt class="text-slate-400">Owner</dt>
                            <dd class="mt-1 font-semibold text-white">{{ $course->owner?->name }}</dd>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-slate-900/40 p-4">
                            <dt class="text-slate-400">Starts</dt>
                            <dd class="mt-1 font-semibold text-white">{{ optional($course->starts_at)->format('d M Y H:i') ?? 'TBD' }}</dd>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-slate-900/40 p-4">
                            <dt class="text-slate-400">Ends</dt>
                            <dd class="mt-1 font-semibold text-white">{{ optional($course->ends_at)->format('d M Y H:i') ?? 'TBD' }}</dd>
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-slate-900/40 p-4">
                            <dt class="text-slate-400">Students</dt>
                            <dd class="mt-1 font-semibold text-white">{{ $course->students->count() }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8 flex flex-wrap gap-3">
                        @auth
                            @if ($course->students->contains(auth()->id()))
                                <form method="POST" action="{{ route('courses.unenroll', $course) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="rounded-full bg-white px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-200">Unenroll</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('courses.enroll', $course) }}">
                                    @csrf
                                    <button class="rounded-full bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">Enroll</button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="rounded-full bg-cyan-400 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">Login to enroll</a>
                        @endauth

                        @can('is_owner', $course)
                            <a href="{{ route('courses.edit', $course) }}" class="rounded-full border border-white/15 px-5 py-3 text-sm font-semibold text-slate-100 transition hover:border-cyan-400/50 hover:text-white">Edit</a>
                            <form method="POST" action="{{ route('courses.destroy', $course) }}">
                                @csrf
                                @method('DELETE')
                                <button class="rounded-full border border-rose-400/40 px-5 py-3 text-sm font-semibold text-rose-200 transition hover:border-rose-300 hover:text-white">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
