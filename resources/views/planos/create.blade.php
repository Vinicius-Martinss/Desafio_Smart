
<x-app-layout>
    <x-slot name="headerTitle">Novo Plano</x-slot>
    <x-slot name="headerSub">Cadastre um novo plano de internet</x-slot>

    <form id="plano-form" method="POST" action="{{ route('planos.store') }}">        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Plano</label>
                    <input type="text"
                    class="form-control @error('nome') is-invalid @enderror"
                    id="nome"
                    name="nome"
                    value="{{ old('nome') }}"
                    required >
                    @error('nome')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="velocidade" class="form-label">Velocidade (Mbps)</label>
                    <input type="text"
                    class="form-control @error('velocidade') is-invalid @enderror"
                    id="velocidade"
                    name="velocidade"
                    value="{{ old('velocidade') }}"
                    required>
                    @error('velocidade')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input type="text"
                    class="form-control @error('preco') is-invalid @enderror"
                    id="preco"
                    name="preco"
                    value="{{ old('preco') }}"
                    required>
                    @error('preco')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao') }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bx bx-save"></i> Salvar Plano
        </button>
        <a href="{{ route('planos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

    @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('plano-form');
    if (!form) return;

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const action = form.getAttribute('action');
        const method = form.querySelector('[name="_method"]')?.value || 'POST';

        try {
    const response = await fetch(action, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: formData
    });

    let data;
    try {
        data = await response.json();
    } catch (e) {
        const text = await response.text();
        console.error('Resposta inesperada:', text);
        Swal.fire('Erro', 'Resposta inválida do servidor. Verifique o console.', 'error');
        return;
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
        title: data.message || 'Plano salvo com sucesso!',
        timer: 2000,
        showConfirmButton: false
    });

    if (data.redirect) {
        window.location.href = data.redirect;
    }

} catch (err) {
    console.error(err);
    Swal.fire('Erro', err.message || 'Falha ao salvar plano', 'error');
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
  --texto:#131313;
}
    input:focus, textarea:focus, select:focus {
        border-color: var(--detalhe)!important; 
        border: 1px solid ;
    }

    .form-control.is-invalid:focus {
        border-color: var(--detalhe)!important;
        border: 1px solid ;
    }
</style>
@endpush
</x-app-layout>