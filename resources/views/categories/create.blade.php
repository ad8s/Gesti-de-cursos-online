<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold tracking-tight text-white">{{ __('Create category') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-6 p-6 sm:p-8">
                    @csrf
                    @include('categories._form')
                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.categories.index') }}" class="rounded-full border border-white/10 px-4 py-2 text-sm font-medium text-slate-200 transition hover:border-cyan-400/50 hover:text-white">{{ __('Cancel') }}</a>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
