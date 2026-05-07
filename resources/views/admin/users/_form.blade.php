@php($user = $user ?? null)

<div class="grid gap-6 lg:grid-cols-2">
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user?->name)" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user?->email)" required />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
    </div>

    <div class="lg:col-span-2">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" @required(! $user) autocomplete="new-password" />
        <p class="mt-2 text-sm text-slate-400">{{ __('Type the password here, then confirm it below.') }}</p>
        <x-input-error class="mt-2" :messages="$errors->get('password')" />
    </div>

    <div class="lg:col-span-2">
        <x-input-label for="password_confirmation" :value="__('Confirm password')" />
        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
    </div>

    <div class="lg:col-span-2 flex items-center gap-3">
        <input type="hidden" name="is_admin" value="0">
        <label class="inline-flex items-center gap-3 text-sm font-medium text-slate-200">
            <input id="is_admin" name="is_admin" type="checkbox" value="1" class="rounded border-white/10 text-cyan-400 shadow-sm focus:ring-cyan-400" @checked(old('is_admin', $user?->is_admin ?? false))>
            {{ __('Admin') }}
        </label>
    </div>
</div>
