    <x-app-layout>
        <x-slot name="headerTitle">Editar Plano</x-slot>
        <x-slot name="headerSub">Atualize os dados do plano de internet</x-slot>

            <form id="plano-form" method="POST" action="{{ route('admin.planos.update', $plano->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Plano</label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror"
                            id="nome" name="nome" value="{{ old('nome', $plano->nome) }}" required>
                        @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="velocidade" class="form-label">Velocidade (Mbps)</label>
                        <input type="text" class="form-control @error('velocidade') is-invalid @enderror"
                            id="velocidade" name="velocidade" value="{{ old('velocidade', $plano->velocidade) }}" required>
                        @error('velocidade')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço (R$)</label>
                        <input type="text" class="form-control @error('preco') is-invalid @enderror"
                            id="preco" name="preco" value="{{ old('preco', $plano->preco) }}" required>
                        @error('preco')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="ativo" {{ old('status', $plano->status) === 'ativo' ? 'selected' : '' }}>Ativo</option>
                            <option value="inativo" {{ old('status', $plano->status) === 'inativo' ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao', $plano->descricao) }}</textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bx bx-save"></i> Atualizar Plano
            </button>
            <a href="{{ route('planos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>

        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('plano-form');
                if (!form) return;
        
                // Salvar os valores originais dos campos
                const originalData = {
                    nome: form.nome.value,
                    velocidade: form.velocidade.value,
                    preco: form.preco.value,
                    status: form.status.value,
                    descricao: form.descricao.value,
                };
        
                form.addEventListener('submit', async function (e) {
                    e.preventDefault();
        
                    // Comparar dados atuais com os originais
                    const currentData = {
                        nome: form.nome.value,
                        velocidade: form.velocidade.value,
                        preco: form.preco.value,
                        status: form.status.value,
                        descricao: form.descricao.value,
                    };
        
                    const isUnchanged = Object.keys(originalData).every(key => originalData[key] === currentData[key]);
        
                    if (isUnchanged) {
                        return Swal.fire({
                            icon: 'info',
                            title: 'Nenhuma alteração detectada',
                            text: 'Você não fez nenhuma modificação nos dados.',
                        });
                    }
        
                    const formData = new URLSearchParams(new FormData(form));
        
                    try {
                        const response = await fetch(form.action, {
                            method: form.querySelector('[name="_method"]')?.value || 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: formData.toString()
                        });
        
                        let data;
                        try {
                            data = await response.json();
                        } catch (e) {
                            const text = await response.text();
                            console.error('Resposta inesperada:', text);
                            return Swal.fire('Erro', 'Resposta inválida do servidor. Verifique o console.', 'error');
                        }
        
                        if (!response.ok) {
                            if (data.errors) {
                                let html = '';
                                Object.values(data.errors).forEach(errArr => {
                                    html += `<p>${errArr.join('<br>')}</p>`;
                                });
        
                                return Swal.fire({
                                    icon: 'error',
                                    title: 'Erro na validação',
                                    html: html
                                });
                            } else {
                                throw new Error(data.message || 'Erro inesperado');
                            }
                        }
        
                        await Swal.fire({
                            icon: 'success',
                            title: data.message || 'Plano atualizado com sucesso!',
                            timer: 2000,
                            showConfirmButton: false
                        });
        
                        if (data.redirect) {
                            window.location.href = data.redirect;
                        }
        
                    } catch (err) {
                        console.error(err);
                        Swal.fire('Erro', err.message || 'Falha ao atualizar plano', 'error');
                    }
                });
            });
        </script>
        @endpush
        

        @push('styles')
            <style>
                :root {
                    --fundo: #EBEBEB;
                    --detalhe: #3AB6C9;
                    --cor-acento: #464646;
                    --texto: #131313;
                }

                input:focus, textarea:focus, select:focus {
                    border-color: var(--detalhe) !important;
                    border: 1px solid;
                }

                .form-control.is-invalid:focus {
                    border-color: var(--detalhe) !important;
                    border: 1px solid;
                }
            </style>
        @endpush
    </x-app-layout>
