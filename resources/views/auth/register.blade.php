<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

<!-- Username -->
<div>
    <x-input-label for="username" :value="__('Username')" />
    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required minlength="10" autofocus autocomplete="username" />
    <x-input-error :messages="$errors->get('username')" class="mt-2" />
</div>

<!-- Nama Lengkap -->
<div class="mt-4">
    <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
    <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autocomplete="name" />
    <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
</div>

<!-- Email Address -->
<div class="mt-4">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<!-- Nomor Telepon -->
<div class="mt-4">
    <x-input-label for="notelp" :value="__('Nomor Telepon')" />
    <x-text-input id="notelp" class="block mt-1 w-full" type="text" name="notelp" :value="old('notelp')" required />
    <x-input-error :messages="$errors->get('notelp')" class="mt-2" />
</div>

<!-- Gaji Pokok -->
<div class="mt-4">
    <x-input-label for="gaji_pokok" :value="__('Gaji Pokok')" />
    <x-text-input id="gaji_pokok" class="block mt-1 w-full" type="number" step="0.01" name="gaji_pokok" :value="old('gaji_pokok')" />
    <x-input-error :messages="$errors->get('gaji_pokok')" class="mt-2" />
</div>

<!-- Pinjaman -->
<div class="mt-4">
    <x-input-label for="pinjaman" :value="__('Pinjaman')" />
    <x-text-input id="pinjaman" class="block mt-1 w-full" type="number" step="0.01" name="pinjaman" :value="old('pinjaman')" />
    <x-input-error :messages="$errors->get('pinjaman')" class="mt-2" />
</div>

<!-- Password -->
<div class="mt-4">
    <x-input-label for="password" :value="__('Password')" />
    <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
