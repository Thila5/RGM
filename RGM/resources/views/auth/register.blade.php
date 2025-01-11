<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}" class="bg-gray-800 text-white p-6 rounded shadow-md w-full max-w-sm mx-auto">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-white" />
            <x-text-input id="name" class="block mt-1 w-full text-white bg-gray-700 border-gray-600" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-white" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" class="block mt-1 w-full text-white bg-gray-700 border-gray-600" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-white" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-white" />
            <x-text-input id="password" class="block mt-1 w-full text-white bg-gray-700 border-gray-600"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-white" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full text-white bg-gray-700 border-gray-600"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-white" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="user_level" :value="__('Role')" class="text-white" />
            <select name="user_level" id="user_level" class="block mt-1 w-full p-4 text-white bg-gray-800 border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50" required>
                <option value=4 >Admin Executive</option>
                <option value=3 >Staff</option>
                <option value=0 >User</option>
            </select>
            <x-input-error :messages="$errors->get('user_level')" class="mt-2 text-white" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white hover:text-gray-400" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
