<x-guest-layout>
    <x-auth-card>


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="bg-indigo-900 py-2 lg:px-4 my-2 rounded-lg">
                <div class="p-2 bg-indigo-800  text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                    role="alert">
                    <span
                        class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">Error</span>
                    <span class="font-semibold mr-2 text-left flex-auto">{{ $error }}</span>

                </div>
            </div>
            @endforeach
            @endif

            <!-- Email Address -->
            <div>
                <x-input-label for="phone" :value="__('phone')" />

                <x-text-input class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autofocus />

            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="current-password" />

            </div>


            <div class="flex items-center justify-end mt-4">
                <a href={{ url('register') }} class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('No Account , Create One?') }}
                </a>

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
