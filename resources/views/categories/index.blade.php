<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('Categories') }}</h2>
            <a href="{{ route('admin.categories.create') }}" class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700">{{ __('New category') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-gray-200">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead>
                                <tr class="text-left text-gray-500">
                                    <th class="py-3 pr-6 font-medium">{{ __('Name') }}</th>
                                    <th class="py-3 pr-6 font-medium">{{ __('Slug') }}</th>
                                    <th class="py-3 pr-6 font-medium">{{ __('Courses') }}</th>
                                    <th class="py-3 pr-6 font-medium">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($categories as $category)
                                    <tr>
                                        <td class="py-4 pr-6 font-medium text-gray-900">{{ $category->name }}</td>
                                        <td class="py-4 pr-6 text-gray-600">{{ $category->slug }}</td>
                                        <td class="py-4 pr-6 text-gray-600">{{ $category->courses_count }}</td>
                                        <td class="py-4 pr-6">
                                            <div class="flex flex-wrap gap-3">
                                                <a href="{{ route('admin.categories.edit', $category) }}" class="font-medium text-cyan-700 hover:text-cyan-900">{{ __('Edit') }}</a>
                                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="font-medium text-rose-700 hover:text-rose-900">{{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-8 text-gray-500">{{ __('No categories yet.') }}</td>
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
