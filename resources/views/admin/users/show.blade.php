<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $user->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">
                <div class="p-6">
                    <dl class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm text-gray-500">{{ __('Email') }}</dt>
                            <dd class="mt-1 text-gray-900">{{ $user->email }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-gray-500">{{ __('Admin') }}</dt>
                            <dd class="mt-1 text-gray-900">{{ $user->is_admin ? __('Yes') : __('No') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm text-gray-500">{{ __('Courses') }}</dt>
                            <dd class="mt-1 text-gray-900">{{ $user->courses_count }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
