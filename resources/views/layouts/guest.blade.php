<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-950 text-slate-100 antialiased">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.18),_transparent_34%),linear-gradient(180deg,_#0f172a_0%,_#020617_100%)] flex flex-col items-center pt-10">
            <a href="{{ route('courses.index') }}" class="text-sm font-semibold uppercase tracking-[0.35em] text-cyan-300">Cursos</a>

            <div class="w-full sm:max-w-md mt-6 px-6 py-6 rounded-2xl border border-white/10 bg-white/5 text-slate-300">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
