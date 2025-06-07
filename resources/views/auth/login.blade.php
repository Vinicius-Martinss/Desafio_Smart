<x-guest-layout>
    <x-authentication-card class="max-w-lg w-full mx-auto">
        <x-slot name="logo">
            {{--centralizar --}}
            <div class="flex justify-center">
                <x-authentication-card-logo 
                    class="w-32 h-32 object-contain" 
                />
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input 
                    id="email" 
                    class="block mt-1 w-full" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input 
                    id="password" 
                    class="block mt-1 w-full" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password" 
                />
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Lembrar-me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a 
                        class="underline text-sm text-gray-600 hover:text-gray-900" 
                        href="{{ route('password.request') }}"
                    >
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif
            </div>
            
            <div class="flex justify-center mt-6">
                <x-button class="w-full max-w-xs justify-center">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="mt-4 text-center">
                @if (Route::has('register'))
                    <a 
                        href="{{ route('register') }}" 
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                    >
                        {{ __('Não possui cadastro? Criar conta') }}
                    </a>
                @endif
            </div>
        </form>
    </x-authentication-card>

    <x-footer-app />
</x-guest-layout>
