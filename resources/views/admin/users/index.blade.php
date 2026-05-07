<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-3xl font-semibold tracking-tight text-white">{{ __('Users') }}</h2>
            <a href="{{ route('admin.users.create') }}" class="rounded-full bg-cyan-400 px-4 py-2 text-sm font-medium text-slate-950 transition hover:bg-cyan-300">{{ __('New user') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-cyan-950/20 backdrop-blur">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-white/10 text-sm">
                            <thead>
                                <tr class="text-left text-slate-400">
                                    <th class="py-3 pr-6 font-medium">{{ __('Name') }}</th>
                                    <th class="py-3 pr-6 font-medium">{{ __('Email') }}</th>
                                    <th class="py-3 pr-6 font-medium">{{ __('Admin') }}</th>
                                    <th class="py-3 pr-6 font-medium">{{ __('Courses') }}</th>
                                    <th class="py-3 pr-6 font-medium">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="py-4 pr-6 font-medium text-white">{{ $user->name }}</td>
                                        <td class="py-4 pr-6 text-slate-300">{{ $user->email }}</td>
                                        <td class="py-4 pr-6 text-slate-300">{{ $user->is_admin ? __('Yes') : __('No') }}</td>
                                        <td class="py-4 pr-6 text-slate-300">{{ $user->courses_count }}</td>
                                        <td class="py-4 pr-6">
                                            <div class="flex flex-wrap gap-3">
                                                <a href="{{ route('admin.users.edit', $user) }}" class="font-medium text-cyan-300 hover:text-white">{{ __('Edit') }}</a>
                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="font-medium text-rose-300 hover:text-white">{{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-8 text-slate-400">{{ __('No users yet.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
