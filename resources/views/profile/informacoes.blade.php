<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informações do Perfil') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Coluna 1: Dados Pessoais -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Dados Pessoais</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nome Completo</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ Auth::user()->name }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">CPF</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ Auth::user()->cpf }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ Auth::user()->data_nascimento }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Gênero</label>
                                    <p class="mt-1 text-sm text-gray-900">
                                        @switch(Auth::user()->genero)
                                            @case('M') Masculino @break
                                            @case('F') Feminino @break
                                            @case('O') Outro @break
                                            @default Não informado
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Coluna 2: Contato e Endereço -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Contato e Endereço</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Telefone</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ Auth::user()->telefone }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">CEP</label>
                                    <p class="mt-1 text-sm text-gray-900">{{ Auth::user()->cep }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Endereço</label>
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ Auth::user()->logradouro }}, 
                                        {{ Auth::user()->numero }}
                                        @if(Auth::user()->complemento)
                                            - {{ Auth::user()->complemento }}
                                        @endif
                                    </p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Bairro/Cidade/Estado</label>
                                    <p class="mt-1 text-sm text-gray-900">
                                        {{ Auth::user()->bairro }} - 
                                        {{ Auth::user()->cidade }}/{{ Auth::user()->estado }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                            Editar Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>