<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-full bg-cyan-400 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-slate-950 transition duration-150 ease-in-out hover:bg-cyan-300 focus:bg-cyan-300 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-slate-950 active:bg-cyan-500']) }}>
    {{ $slot }}
</button>
