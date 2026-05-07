<x-app-layout>
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
</x-app-layout>
