
<x-app-layout>
    <x-slot name="header">
      <h2 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-800 leading-tight">
        Bem-vindo, {{ $user->name }}
      </h2>
    </x-slot>
  
    <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
  
        {{-- 1) Cards de Estatísticas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center">
              <i class="fas fa-list fa-2x text-gray-500"></i>
              <div class="ml-4">
                <p class="text-sm text-gray-500">Total de Planos</p>
                <p class="text-2xl font-semibold">{{ $totalPlanos }}</p>
              </div>
            </div>
          </div>
          <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center">
              <i class="fas fa-check-circle fa-2x text-green-500"></i>
              <div class="ml-4">
                <p class="text-sm text-gray-500">Planos Ativos</p>
                <p class="text-2xl font-semibold">{{ $ativos }}</p>
              </div>
            </div>
          </div>
          <div class="bg-white p-6 rounded-2xl shadow">
            <div class="flex items-center">
              <i class="fas fa-ban fa-2x text-red-500"></i>
              <div class="ml-4">
                <p class="text-sm text-gray-500">Planos Inativos</p>
                <p class="text-2xl font-semibold">{{ $inativos }}</p>
              </div>
            </div>
          </div>
        </div>
  
        {{-- 2) Botão "Criar Novo Plano" --}}
        <div class="flex justify-end">
          <a href="{{ route('planos.create') }}"
             class="btn btn-primary">
            <i class="bx bx-plus"></i> Criar Novo Plano
          </a>
        </div>
  
        {{-- 3) Lista (tabela) dos Últimos 5 Planos --}}
        <div class="bg-white p-6 rounded-2xl shadow">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Últimos Planos Cadastrados</h3>
  
          @if($ultimosPlanos->isEmpty())
            <p class="text-gray-500">Você ainda não cadastrou nenhum plano.</p>
          @else
            <div class="overflow-x-auto">
              <table class="table-auto w-full text-left text-gray-800">
                <thead class="bg-gray-100">
                  <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nome</th>
                    <th class="px-4 py-2">Velocidade</th>
                    <th class="px-4 py-2">Preço</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($ultimosPlanos as $plano)
                    <tr class="border-b">
                      <td class="px-4 py-2">{{ $plano->id }}</td>
                      <td class="px-4 py-2">{{ $plano->nome }}</td>
                      <td class="px-4 py-2">{{ $plano->velocidade }} Mbps</td>
                      <td class="px-4 py-2">R$ {{ number_format($plano->preco, 2, ',', '.') }}</td>
                      <td class="px-4 py-2">
                        <span class="inline-block px-2 py-1 text-xs rounded-full
                          {{ $plano->status === 'ativo' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                          {{ ucfirst($plano->status) }}
                        </span>
                      </td>
                      <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('planos.edit', $plano->id) }}"
                           class="btn  btn-warning me-1">
                          <i class="bx bx-edit-alt"></i>Editar
                        </a>
                        <button data-url="{{ route('planos.destroy', $plano->id) }}"
                                data-nome="{{ $plano->nome }}"
                                class="btn btn-danger btn-delete">
                          <i class="bx bx-trash"></i>Excluir
                        </button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
  
            <div class="mt-4 text-right">
              <a href="{{ route('planos.index') }}"
                 class="text-blue-600 hover:underline">
                 Ver todos os planos →
              </a>
            </div>
          @endif
        </div>
  
      </div>
    </div>
  
    {{-- Scripts SweetAlert para confirmação de exclusão --}}
    @push('scripts')
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
        $(document).on('click', '.btn-delete-planos', function () {
          const url = $(this).data('url');
          const nome = $(this).data('nome');
  
          Swal.fire({
            title: `Excluir plano "${nome}"?`,
            text: "Essa ação não poderá ser desfeita.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                  _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                  if (response.success) {
                    Swal.fire('Excluído!', '', 'success');
                    setTimeout(() => location.reload(), 800);
                  } else {
                    Swal.fire('Erro', 'Não foi possível excluir.', 'error');
                  }
                },
                error: function() {
                  Swal.fire('Erro', 'Falha no servidor.', 'error');
                }
              });
            }
          });
        });
      </script>
    @endpush
  </x-app-layout>