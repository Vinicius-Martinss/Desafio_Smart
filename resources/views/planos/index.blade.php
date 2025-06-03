<x-app-layout>
    <x-slot name="headerTitle">Meus Planos</x-slot>
    <x-slot name="headerSub">Gerencie os planos da sua empresa</x-slot>

    <div class="card">
        <div class="card-body">
            <!-- Botão para criar sempre visível -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Planos cadastrados</h5>
                <a href="{{ route('planos.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus"></i> Novo Plano
                </a>
            </div>

            @if ($planos->isEmpty())
                <div class="text-center p-5">
                    <h4 class="mb-3">Nenhum plano cadastrado ainda</h4>
                    <p>Você ainda não criou nenhum plano. Clique no botão abaixo para começar.</p>
                    <a href="{{ route('planos.create') }}" class="btn btn-success">
                        <i class="bx bx-plus"></i> Criar meu primeiro plano
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Velocidade</th>
                                <th>Preço</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($planos as $plano)
                                <tr>
                                    <td>{{ $plano->nome }}</td>
                                    <td>{{ $plano->velocidade }} Mbps</td>
                                    <td>R$ {{ number_format($plano->preco, 2, ',', '.') }}</td>
                                    <td>{{ $plano->descricao }}</td>
                                    <td>
                                        <a href="{{ route('planos.edit', $plano) }}" class="btn btn-sm btn-warning">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <form action="{{ route('planos.destroy', $plano) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
