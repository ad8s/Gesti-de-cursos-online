<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-full border border-rose-400/30 bg-rose-500/20 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-rose-100 transition duration-150 ease-in-out hover:bg-rose-500/30 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 focus:ring-offset-slate-950 active:bg-rose-600/40']) }}>
    {{ $slot }}
</button>
