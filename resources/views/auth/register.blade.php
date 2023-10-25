<x-guest-layout class="bg">
    <form class="bg shadow-md" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome Completo: ')" class="font" />
            <x-text-input id="name" class="block mt-1 w-full rounded-lg shadow-md" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Insira seu nome completo:"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail: ')" class="font" />
            <x-text-input id="email" class="block mt-1 w-full rounded-lg shadow-md" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Insira seu e-mail:" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password: ')" class="font"/>
            <x-text-input id="password" class="block mt-1 w-full rounded-lg shadow-md" type="password" name="password" required autocomplete="new-password" placeholder="Insira uma senha de 8 digítos: " />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password: ')" class="font" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full round rounded-lg shadow-md" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme sua senha:"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-900 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4 font-normal shadow-md" style="background-color: #9A2476;">
                {{ __('Confirme') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
