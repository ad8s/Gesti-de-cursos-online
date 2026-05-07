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
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.18),_transparent_34%),linear-gradient(180deg,_#0f172a_0%,_#020617_100%)]">
            @include('layouts.navigation')

            <main class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
                @isset($header)
                    <div class="mb-8 max-w-3xl">
                        {{ $header }}
                    </div>
                @endisset

                <div>
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
