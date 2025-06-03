<x-app-layout>
    <x-slot name="headerTitle">Editar Plano</x-slot>
    <x-slot name="headerSub">Atualize os dados do plano</x-slot>

    <form method="POST" action="{{ route('planos.update', $plano) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do Plano</label>
                    <input type="text" class="form-control" id="nome" name="nome" required value="{{ old('nome', $plano->nome) }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="velocidade" class="form-label">Velocidade (Mbps)</label>
                    <input type="number" step="0.01" class="form-control" id="velocidade" name="velocidade" required value="{{ old('velocidade', $plano->velocidade) }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input type="number" step="0.01" class="form-control" id="preco" name="preco" required value="{{ old('preco', $plano->preco) }}">
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
</x-app-layout>
