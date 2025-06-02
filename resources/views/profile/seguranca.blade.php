<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configurações de Segurança') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Alterar Senha</h3>
                            @livewire('profile.update-password-form')
                        </div>
                    @endif

                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Autenticação de Dois Fatores</h3>
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                    @endif

                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Sessões do Navegador</h3>
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Excluir Conta</h3>
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>