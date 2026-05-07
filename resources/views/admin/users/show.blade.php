<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold tracking-tight text-white">{{ $user->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <div class="p-6">
                    <dl class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm text-slate-400">{{ __('Email') }}</dt>
                            <dd class="mt-1 text-white">{{ $user->email }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-slate-400">{{ __('Admin') }}</dt>
                            <dd class="mt-1 text-white">{{ $user->is_admin ? __('Yes') : __('No') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-slate-400">{{ __('Courses') }}</dt>
                            <dd class="mt-1 text-white">{{ $user->courses_count }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
