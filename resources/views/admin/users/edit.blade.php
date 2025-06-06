<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuário
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow rounded-md">
        <form id="form-editar-usuario"
              action="{{ route('admin.usuarios.update', $user->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- FOTO ATUAL E UPLOAD --}}
            <div class="flex items-center space-x-6">
              @if ($user->profile_photo_path)
    <img src="{{ $user->profile_photo_url }}"
         alt="Foto do usuário"
         class="w-24 h-24 rounded-md object-contain border border-gray-300">
            @endif
                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">
                        Nova Foto (opcional)
                    </label>
                    <input type="file"
                           name="photo"
                           id="photo"
                           accept="image/*"
                           class="mt-1 block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100">
                    @error('photo')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- NOME --}}
            <div class="space-y-1">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ old('name', $user->name) }}"
                       required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-1">
                <label for="nome_empresa" class="block text-sm font-medium text-gray-700">Nome da Empresa</label>
                <input type="text"
                       name="nome_empresa"
                       id="nome_empresa"
                       value="{{ old('nome_empresa', $user->nome_empresa) }}"
                       required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('nome_empresa')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email"
                       name="email"
                       id="email"
                       value="{{ old('email', $user->email) }}"
                       required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- É ADMIN? --}}
            <div class="space-y-1">
                <label for="is_admin" class="block text-sm font-medium text-gray-700">Administrador?</label>
                <select name="is_admin"
                        id="is_admin"
                        required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                    <option value="0" {{ old('is_admin', $user->is_admin) == 0 ? 'selected' : '' }}>Não</option>
                    <option value="1" {{ old('is_admin', $user->is_admin) == 1 ? 'selected' : '' }}>Sim</option>
                </select>
                @error('is_admin')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- CPF --}}
            <div class="space-y-1">
                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                <input type="text"
                       name="cpf"
                       id="cpf"
                       value="{{ old('cpf', $user->cpf) }}"
                       maxlength="14"
                       placeholder="000.000.000-00"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('cpf')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- DATA DE NASCIMENTO --}}
            <div class="space-y-1">
                <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento</label>
                <input type="date"
                       name="data_nascimento"
                       id="data_nascimento"
                       value="{{ old('data_nascimento', $user->data_nascimento?->format('Y-m-d')) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('data_nascimento')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- GÊNERO --}}
            <div class="space-y-1">
                <label for="genero" class="block text-sm font-medium text-gray-700">Gênero</label>
                <select name="genero"
                        id="genero"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                    <option value="">Selecione...</option>
                    <option value="M" {{ (old('genero') ?? $user->genero) === 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ (old('genero') ?? $user->genero) === 'F' ? 'selected' : '' }}>Feminino</option>
                    <option value="O" {{ (old('genero') ?? $user->genero) === 'O' ? 'selected' : '' }}>Outro</option>
                </select>
                @error('genero')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- TELEFONE --}}
            <div class="space-y-1">
                <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
                <input type="text"
                       name="telefone"
                       id="telefone"
                       value="{{ old('telefone', $user->telefone) }}"
                       placeholder="(00) 00000-0000"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('telefone')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- CEP --}}
            <div class="space-y-1">
                <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                <input type="text"
                       name="cep"
                       id="cep"
                       value="{{ old('cep', $user->cep) }}"
                       placeholder="00000-000"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('cep')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- LOGRADOURO --}}
            <div class="space-y-1">
                <label for="logradouro" class="block text-sm font-medium text-gray-700">Logradouro</label>
                <input type="text"
                       name="logradouro"
                       id="logradouro"
                       value="{{ old('logradouro', $user->logradouro) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('logradouro')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- NÚMERO --}}
            <div class="space-y-1">
                <label for="numero" class="block text-sm font-medium text-gray-700">Número</label>
                <input type="text"
                       name="numero"
                       id="numero"
                       value="{{ old('numero', $user->numero) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('numero')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- COMPLEMENTO --}}
            <div class="space-y-1">
                <label for="complemento" class="block text-sm font-medium text-gray-700">Complemento</label>
                <input type="text"
                       name="complemento"
                       id="complemento"
                       value="{{ old('complemento', $user->complemento) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('complemento')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- BAIRRO --}}
            <div class="space-y-1">
                <label for="bairro" class="block text-sm font-medium text-gray-700">Bairro</label>
                <input type="text"
                       name="bairro"
                       id="bairro"
                       value="{{ old('bairro', $user->bairro) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('bairro')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- CIDADE --}}
            <div class="space-y-1">
                <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
                <input type="text"
                       name="cidade"
                       id="cidade"
                       value="{{ old('cidade', $user->cidade) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('cidade')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- ESTADO --}}
            <div class="space-y-1">
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado (UF)</label>
                <input type="text"
                       name="estado"
                       id="estado"
                       value="{{ old('estado', $user->estado) }}"
                       maxlength="2"
                       placeholder="SP"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('estado')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- SENHA (opcional) --}}
            <div class="space-y-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Nova Senha (opcional)</label>
                <input type="password"
                       name="password"
                       id="password"
                       autocomplete="new-password"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- CONFIRMAR SENHA --}}
            <div class="space-y-1">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
                <input type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       autocomplete="new-password"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            </div>

            {{-- BOTÃO DE SUBMIT --}}
            <div class="pt-4">
                <button type="submit"
                        id="btn-submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Salvar alterações
                </button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('form-editar-usuario').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const btn = document.getElementById('btn-submit');
            btn.disabled = true;
            btn.textContent = 'Salvando...';

            // Validação rápida de presença de nome
            if (!form.name.value.trim()) {
                btn.disabled = false;
                btn.textContent = 'Salvar alterações';
                return Swal.fire('Erro', 'O campo Nome é obrigatório.', 'error');
            }

            // Confirma antes de enviar
            const confirmado = await Swal.fire({
                title: 'Confirma atualização?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sim, atualizar',
                cancelButtonText: 'Cancelar'
            });

            if (!confirmado.isConfirmed) {
                btn.disabled = false;
                btn.textContent = 'Salvar alterações';
                return;
            }

            // Prepara FormData (inclui arquivos) e faz fetch
            const data = new FormData(form);
            data.append('_method', 'PUT');

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    },
                    body: data
                });

                const resJson = await response.json();

                if (response.ok) {
                    await Swal.fire('Sucesso', resJson.message || 'Usuário atualizado com sucesso!', 'success');
                    window.location.href = "{{ route('admin.usuarios.index') }}";
                } else if (response.status === 422) {
                    // Erros de validação
                    let html = '';
                    Object.values(resJson.errors).flat().forEach(msg => {
                        html += `<p>${msg}</p>`;
                    });
                    Swal.fire({ icon: 'error', title: 'Erro de validação', html: html });
                } else {
                    throw new Error(resJson.message || 'Erro inesperado');
                }
            } catch (err) {
                Swal.fire('Erro', err.message || 'Ocorreu um erro ao processar o formulário.', 'error');
            } finally {
                btn.disabled = false;
                btn.textContent = 'Salvar alterações';
            }
        });
    </script>
    @endpush

</x-app-layout>