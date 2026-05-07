@php($category = $category ?? null)

<div class="grid gap-6">
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $category?->name)" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="slug" :value="__('Slug')" />
        <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $category?->slug)" />
        <x-input-error class="mt-2" :messages="$errors->get('slug')" />
    </div>

    <div>
        <x-input-label for="description" :value="__('Description')" />
        <textarea id="description" name="description" rows="6" class="mt-1 block w-full rounded-md border border-white/10 bg-slate-900/70 px-3 py-2 text-slate-100 shadow-sm focus:border-cyan-400 focus:ring-cyan-400">{{ old('description', $category?->description) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>
</div>
