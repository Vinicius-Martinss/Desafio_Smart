<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerar Contrato de Prestação de Serviço
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow rounded-md">
        {{-- 1. Mostrar dados da “empresa” (User agora tem nome_empresa) --}}
        <div class="mb-6">
            <h3 class="text-lg font-medium">Dados da Empresa/Provedor</h3>
            <p><strong>Nome da Empresa:</strong> {{ $user->nome_empresa }}</p>
            <p><strong>CPF:</strong> {{ $user->cpf }}</p>
            <p><strong>Cidade:</strong> {{ $user->cidade }}</p>
        </div>

        {{-- 2. Selecionar qual plano utilizar --}}
        <div class="mb-6">
            <h3 class="text-lg font-medium">Selecione o Plano</h3>
            <form action="{{ route('contrato.gerar') }}" method="POST" class="space-y-4">
                @csrf

                <div class="space-y-1">
                    <label for="plano_id" class="block text-sm font-medium text-gray-700">Plano</label>
                    <select name="plano_id"
                            id="plano_id"
                            required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                        <option value="">-- Selecione um Plano --</option>
                        @foreach ($planos as $plano)
                            <option value="{{ $plano->id }}"
                                {{ old('plano_id') == $plano->id ? 'selected' : '' }}>
                                {{ $plano->nome }} — R$ {{ number_format($plano->preco, 2, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('plano_id')
                        <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                {{-- 3. Exibir dados do plano selecionado (opcional) --}}
                {{-- Se quiser mostrar resumo, poderia usar JavaScript para atualizar dinâmico. --}}
                {{-- Vou deixar apenas a seleção sem pré-visualização. --}}

                {{-- 4. Campos de período de vigência --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Data de Início --}}
                    <div class="space-y-1">
                        <label for="data_inicio" class="block text-sm font-medium text-gray-700">Data de Início</label>
                        <input type="date"
                               name="data_inicio"
                               id="data_inicio"
                               value="{{ old('data_inicio') }}"
                               required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                        @error('data_inicio')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Data de Término --}}
                    <div class="space-y-1">
                        <label for="data_termino" class="block text-sm font-medium text-gray-700">Data de Término</label>
                        <input type="date"
                               name="data_termino"
                               id="data_termino"
                               value="{{ old('data_termino') }}"
                               required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                        @error('data_termino')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- 5. Botão de envio --}}
                <div class="pt-4">
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Gerar Contrato (.docx)
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
