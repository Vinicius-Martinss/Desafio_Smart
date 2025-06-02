<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Completar Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('warning'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 relative" role="alert">
                <div class="flex justify-between">
                    <div>
                        <strong class="font-bold">Atenção!</strong>
                        <span class="block sm:inline">{{ session('warning') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()">
                        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            @endif

            @if(!$user->isProfileComplete())
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form id="profile-complete-form" method="POST" action="{{ route('profile.update') }}">
                        @csrf
                            
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-label for="name" value="{{ __('Name') }}" />
                                <x-input id="name" name="name" type="text" class="mt-1 block w-full" 
                                         value="{{ old('name', $user->name) }}" autofocus />
                            </div>
                            
                            <div>
                                <x-label for="cpf" value="CPF" />
                                <x-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" 
                                         value="{{ old('cpf', $user->cpf) }}" placeholder="000.000.000-00" />

                                @if($user->cpf_validado)
                                    <p class="text-green-600 text-sm mt-1">
                                        ✓ CPF validado em {{ $user->cpf_ultima_verificacao->format('d/m/Y H:i') }}
                                    </p>
                                @elseif($user->cpf)
                                    <p class="text-red-600 text-sm mt-1">
                                        ✗ CPF não validado
                                    </p>
                                @endif
                            </div>
                            
                            <div>
                                <x-label for="data_nascimento" value="Data de Nascimento" />
                                <x-input id="data_nascimento" name="data_nascimento" type="date" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('data_nascimento', $user->data_nascimento) }}" />
                            </div>
                            
                            <div>
                                <x-label for="genero" value="Gênero" />
                                <select id="genero" name="genero" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Selecione</option>
                                    <option value="M" {{ old('genero', $user->genero) == 'M' ? 'selected' : '' }}>Masculino</option>
                                    <option value="F" {{ old('genero', $user->genero) == 'F' ? 'selected' : '' }}>Feminino</option>
                                    <option value="O" {{ old('genero', $user->genero) == 'O' ? 'selected' : '' }}>Outro</option>
                                </select>
                            </div>
                            
                            <div>
                                <x-label for="telefone" value="Telefone" />
                                <x-input id="telefone" name="telefone" type="text" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('telefone', $user->telefone) }}" placeholder="(00) 00000-0000" />
                            </div>
                            
                            <div>
                                <x-label for="cep" value="CEP" />
                                <x-input id="cep" name="cep" type="text" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('cep', $user->cep) }}" placeholder="00000-000" />
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div>
                                <x-label for="logradouro" value="Logradouro" />
                                <x-input id="logradouro" name="logradouro" type="text" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('logradouro', $user->logradouro) }}" />
                            </div>
                            
                            <div>
                                <x-label for="numero" value="Número" />
                                <x-input id="numero" name="numero" type="text" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('numero', $user->numero) }}" />
                            </div>
                            
                            <div>
                                <x-label for="complemento" value="Complemento" />
                                <x-input id="complemento" name="complemento" type="text" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('complemento', $user->complemento) }}" />
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div>
                                <x-label for="bairro" value="Bairro" />
                                <x-input id="bairro" name="bairro" type="text" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('bairro', $user->bairro) }}" />
                            </div>
                            
                            <div>
                                <x-label for="cidade" value="Cidade" />
                                <x-input id="cidade" name="cidade" type="text" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('cidade', $user->cidade) }}" />
                            </div>
                            
                            <div>
                                <x-label for="estado" value="Estado" />
                                <x-input id="estado" name="estado" type="text" 
                                         class="mt-1 block w-full" 
                                         value="{{ old('estado', $user->estado) }}" maxlength="2" />
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" id="submit-btn" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                                <span id="submit-text">Salvar Informações</span>
                                <span id="loading-spinner" class="ml-2 hidden">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>

                    <div id="success-message" class="hidden mb-4 rounded-lg border border-green-400 bg-green-100 p-4 text-green-700">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"/>
                            </svg>
                            <span id="success-text">Perfil atualizado com sucesso!</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Seções padrão do Jetstream -->
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>
                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // ===================================================================
            // CONFIGURAÇÕES IMPORTANTES
            // ===================================================================
            const RECEITAWS_TOKEN = ''; // Coloque seu token premium aqui
            const USE_TEST_CPFS = false; // Usar lista de CPFs de teste? (true para desenvolvimento)
            

            // ===================================================================
            // FUNÇÕES DE MÁSCARAS
            // ===================================================================
            function applyCPFMask(input) {
                input.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '');
                    if (value.length > 11) value = value.substring(0, 11);
                    
                    // Aplicar máscara: 000.000.000-00
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
                    value = value.replace(/(\d{3})\.(\d{3})\.(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
                    
                    this.value = value;
                });
            }

            function applyPhoneMask(input) {
                input.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '');
                    if (value.length > 11) value = value.substring(0, 11);
                    
                    // Aplicar máscara: (00) 00000-0000
                    if (value.length > 2) {
                        value = '(' + value.substring(0, 2) + ') ' + value.substring(2);
                    }
                    if (value.length > 10) {
                        value = value.substring(0, 10) + '-' + value.substring(10);
                    }
                    
                    this.value = value;
                });
            }

            function applyCEPMask(input) {
                input.addEventListener('input', function() {
                    let value = this.value.replace(/\D/g, '');
                    if (value.length > 8) value = value.substring(0, 8);
                    
                    // Aplicar máscara: 00000-000
                    if (value.length > 5) {
                        value = value.substring(0, 5) + '-' + value.substring(5);
                    }
                    
                    this.value = value;
                    
                    // Buscar CEP automaticamente quando completo
                    if (value.length === 9 && value.includes('-')) {
                        fetchCEP(value.replace('-', ''));
                    }
                });
            }

            // ===================================================================
            // FUNÇÃO PARA BUSCAR CEP
            // ===================================================================
            function fetchCEP(cep) {
                if (cep.length !== 8) return;
                
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => {
                        if (!response.ok) throw new Error('Erro na rede');
                        return response.json();
                    })
                    .then(data => {
                        if (data.erro) {
                            throw new Error('CEP não encontrado');
                        }
                        
                        // Preencher campos automaticamente
                        document.getElementById('logradouro').value = data.logradouro || '';
                        document.getElementById('bairro').value = data.bairro || '';
                        document.getElementById('cidade').value = data.localidade || '';
                        document.getElementById('estado').value = data.uf || '';
                    })
                    .catch(error => {
                        console.error('Erro ao buscar CEP:', error);
                    });
            }

            // ===================================================================
            // VALIDAÇÃO DE CPF
            // ===================================================================
            // Cache para validação de CPF
            const cpfValidationCache = {};

            // Função para validar CPF via algoritmo (local)
            function validateCPFAlgorithm(cpf) {
                if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) return false;
                
                let sum = 0;
                let remainder;
                
                // Validar primeiro dígito verificador
                for (let i = 1; i <= 9; i++) {
                    sum += parseInt(cpf.substring(i-1, i)) * (11 - i);
                }
                remainder = (sum * 10) % 11;
                if (remainder === 10 || remainder === 11) remainder = 0;
                if (remainder !== parseInt(cpf.substring(9, 10))) return false;
                
                // Validar segundo dígito verificador
                sum = 0;
                for (let i = 1; i <= 10; i++) {
                    sum += parseInt(cpf.substring(i-1, i)) * (12 - i);
                }
                remainder = (sum * 10) % 11;
                if (remainder === 10 || remainder === 11) remainder = 0;
                
                return remainder === parseInt(cpf.substring(10, 11));
            }

            // Função principal para validar CPF
            async function validateCPF(cpf) {
                if (cpf.length !== 11) return false;

                // 1. Verificar se é um CPF de teste válido
                if (USE_TEST_CPFS && VALID_TEST_CPFS.includes(cpf)) {
                    return true;
                }
                
                // 2. Verificar cache
                const cached = cpfValidationCache[cpf];
                if (cached && (Date.now() - cached.timestamp) < 300000) {
                    return cached.valid;
                }
                
                // 3. Validar algoritmo localmente primeiro
                const isValidLocal = validateCPFAlgorithm(cpf);
                if (!isValidLocal) return false;

                try {
                    // Mostrar loading
                    const loadingSwal = Swal.fire({
                        title: 'Validando CPF...',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });

                    // Configurar timeout para evitar bloqueio
                    const controller = new AbortController();
                    const timeoutId = setTimeout(() => controller.abort(), 10000);
                    
                    // Montar URL com token se disponível
                    const url = RECEITAWS_TOKEN 
                        ? `https://receitaws.com.br/v1/cpf/${cpf}?token=${RECEITAWS_TOKEN}`
                        : `https://receitaws.com.br/v1/cpf/${cpf}`;
                    
                    const response = await fetch(url, {
                        signal: controller.signal
                    });
                    
                    clearTimeout(timeoutId);
                    
                    if (!response.ok) {
                        throw new Error(`Erro na API: ${response.status}`);
                    }

                    const data = await response.json();
                    const isValid = data.status === 'OK';
                    
                    await Swal.close();
                    
                    // Armazenar no cache
                    cpfValidationCache[cpf] = {
                        valid: isValid,
                        timestamp: Date.now(),
                        response: data
                    };

                    return isValid;
                } catch (error) {
                    await Swal.close();
                    
                    // Se a API falhar, retornar a validação local
                    if (isValidLocal) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Validação Local',
                            text: 'API indisponível. CPF validado localmente.',
                            timer: 3000
                        });
                        return true;
                    }
                    
                    console.error('Erro na validação do CPF:', error);
                    return false;
                }
            }

            // ===================================================================
            // INICIALIZAÇÃO DA PÁGINA
            // ===================================================================
            document.addEventListener('DOMContentLoaded', function() {
                // Aplicar máscaras
                const cpfInput = document.getElementById('cpf');
                if (cpfInput) {
                    applyCPFMask(cpfInput);
                    
                    // Adicionar evento de blur para validar CPF
                    cpfInput.addEventListener('blur', async function() {
                        const rawCpf = this.value.replace(/\D/g, '');
                        if (rawCpf.length !== 11) return;

                        const isValid = await validateCPF(rawCpf);
                        
                        if (isValid) {
                            Swal.fire({
                                icon: 'success',
                                title: 'CPF válido!',
                                text: 'O CPF foi verificado com sucesso.',
                                timer: 3000
                            });
                            
                            // Atualizar status visual imediatamente
                            const statusElement = this.nextElementSibling;
                            if (statusElement) {
                                statusElement.innerHTML = 
                                    '✓ CPF validado (aguardando confirmação do servidor)';
                                statusElement.classList.remove('text-red-600');
                                statusElement.classList.add('text-green-600');
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'CPF inválido',
                                text: 'Por favor, verifique o número do CPF.',
                            });
                        }
                    });
                }

                const phoneInput = document.getElementById('telefone');
                if (phoneInput) applyPhoneMask(phoneInput);

                const cepInput = document.getElementById('cep');
                if (cepInput) applyCEPMask(cepInput);

                // Envio do formulário com tratamento completo
                const form = document.getElementById('profile-complete-form');
                if (form) {
                    form.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        
                        const btn = document.getElementById('submit-btn');
                        const spinner = document.getElementById('loading-spinner');
                        const submitText = document.getElementById('submit-text');
                        
                        // Mostrar loading
                        btn.disabled = true;
                        spinner.classList.remove('hidden');
                        submitText.textContent = 'Salvando...';
                        
                        try {
                            // Remover máscaras antes de enviar
                            const cpf = document.getElementById('cpf');
                            if (cpf) cpf.value = cpf.value.replace(/\D/g, '');
                            
                            const phone = document.getElementById('telefone');
                            if (phone) phone.value = phone.value.replace(/\D/g, '');
                            
                            const cep = document.getElementById('cep');
                            if (cep) cep.value = cep.value.replace(/\D/g, '');
                            
                            // Enviar dados
                            const formData = new FormData(this);
                            const response = await fetch(this.action, {
                                method: 'POST',
                                body: formData,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json'
                                }
                            });
                            
                            if (!response.ok) {
                                const errorData = await response.json();
                                throw new Error(errorData.message || 'Erro no servidor');
                            }
                            
                            const data = await response.json();
                            
                            if (data.success) {
                                Swal.fire({
                                icon: 'success',
                                title: 'Sucesso',
                                text: data.message || 'Perfil atualizado com sucesso!',
                                timer: 2000,
                                showConfirmButton: false
                                });
                                setTimeout(() => { window.location.href = data.redirect; }, 2000);
                            } else {
                                throw new Error(data.message || 'Erro ao salvar perfil');
                            }
                        } catch (error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro',
                                text: error.message || 'Ocorreu um erro ao salvar as informações',
                            });
                        } finally {
                            // Restaurar máscaras após envio
                            const cpf = document.getElementById('cpf');
                            if (cpf && cpf.value.length === 11) {
                                cpf.value = cpf.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
                            }
                            
                            const phone = document.getElementById('telefone');
                            if (phone && phone.value.length === 11) {
                                phone.value = phone.value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
                            }
                            
                            const cep = document.getElementById('cep');
                            if (cep && cep.value.length === 8) {
                                cep.value = cep.value.replace(/(\d{5})(\d{3})/, '$1-$2');
                            }
                            
                            // Restaurar botão
                            btn.disabled = false;
                            spinner.classList.add('hidden');
                            submitText.textContent = 'Salvar Informações';
                        }
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>