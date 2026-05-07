@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full border-l-4 border-cyan-400 bg-cyan-400/10 py-2 ps-3 pe-4 text-start text-base font-medium text-white transition duration-150 ease-in-out focus:outline-none focus:text-white focus:bg-white/5'
            : 'block w-full border-l-4 border-transparent py-2 ps-3 pe-4 text-start text-base font-medium text-slate-300 transition duration-150 ease-in-out hover:border-cyan-400/50 hover:bg-white/5 hover:text-white focus:outline-none focus:text-white focus:bg-white/5';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
