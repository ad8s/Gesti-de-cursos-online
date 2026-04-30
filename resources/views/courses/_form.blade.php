@php($course = $course ?? null)

<div class="grid gap-6 lg:grid-cols-2">
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $course?->title)" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>

    <div>
        <x-input-label for="slug" :value="__('Slug')" />
        <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $course?->slug)" />
        <x-input-error class="mt-2" :messages="$errors->get('slug')" />
    </div>

    <div>
        <x-input-label for="category_id" :value="__('Category')" />
        <select id="category_id" name="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
            <option value="">{{ __('Select a category') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $course?->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
    </div>

    <div>
        <x-input-label for="level" :value="__('Level')" />
        <select id="level" name="level" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500" required>
            @foreach (['beginner', 'intermediate', 'advanced'] as $level)
                <option value="{{ $level }}" @selected(old('level', $course?->level ?? 'beginner') === $level)>{{ ucfirst($level) }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('level')" />
    </div>

    <div>
        <x-input-label for="starts_at" :value="__('Starts at')" />
        <x-text-input id="starts_at" name="starts_at" type="datetime-local" class="mt-1 block w-full" :value="old('starts_at', $course?->starts_at?->format('Y-m-d\\TH:i'))" />
        <x-input-error class="mt-2" :messages="$errors->get('starts_at')" />
    </div>

    <div>
        <x-input-label for="ends_at" :value="__('Ends at')" />
        <x-text-input id="ends_at" name="ends_at" type="datetime-local" class="mt-1 block w-full" :value="old('ends_at', $course?->ends_at?->format('Y-m-d\\TH:i'))" />
        <x-input-error class="mt-2" :messages="$errors->get('ends_at')" />
    </div>

    <div class="lg:col-span-2">
        <x-input-label for="description" :value="__('Description')" />
        <textarea id="description" name="description" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-cyan-500 focus:ring-cyan-500">{{ old('description', $course?->description) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>

    <div class="lg:col-span-2 flex items-center gap-3">
        <input type="hidden" name="is_published" value="0">
        <label class="inline-flex items-center gap-3 text-sm font-medium text-gray-700">
            <input id="is_published" name="is_published" type="checkbox" value="1" class="rounded border-gray-300 text-cyan-600 shadow-sm focus:ring-cyan-500" @checked(old('is_published', $course?->is_published ?? true))>
            {{ __('Published') }}
        </label>
    </div>
</div>
