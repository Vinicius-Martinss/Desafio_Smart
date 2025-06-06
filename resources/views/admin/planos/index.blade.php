<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold text-gray-800 leading-tight">Gerenciar Planos</h2>
  </x-slot>

  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 rounded-2xl shadow-md">

        {{-- Cabeçalho --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
          <i class="fas fa-network-wired text-blue-600"></i> Gerenciar Planos
        </h2>

        {{-- Mensagem de sucesso via SweetAlert (opcional) --}}
        @if(session('success'))
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Sucesso',
              text: '{{ session('success') }}',
              timer: 2000,
              showConfirmButton: false
            });
          </script>
        @endif

        @if($planos->isEmpty())
          <div class="text-center py-5">
            <h4 class="mb-0">Nenhum plano cadastrado ainda</h4>
          </div>
        @else
          <div class="table-responsive">
            <table
              id="tabela-planos"
              class="table table-striped table-bordered nowrap"
              style="width:100%"
            >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Provedor</th>
                  <th>Nome</th>
                  <th>Velocidade (Mbps)</th>
                  <th>Preço (R$)</th>
                  <th>Status</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($planos as $plano)
                  <tr>
                    <td>{{ $plano->id }}</td>
                    <td>{{ $plano->user->name }}</td>
                    <td>{{ $plano->nome }}</td>
                    <td>{{ $plano->velocidade }}</td>
                    <td>R$ {{ number_format($plano->preco, 2, ',', '.') }}</td>
                    <td>
                      <span class="badge bg-{{ $plano->status === 'ativo' ? 'success' : 'secondary' }}">
                        {{ ucfirst($plano->status) }}
                      </span>
                    </td>
                    <td>
                      <a
                        href="{{ route('admin.planos.edit', $plano->id) }}"
                        class="btn btn-warning me-1"
                      >
                        <i class="bx bx-edit-alt"></i>
                      </a>
                      <button
                        class="btn btn-danger btn-delete-plano"
                        data-url="{{ route('admin.planos.destroy', $plano->id) }}"
                        data-nome="{{ $plano->nome }}"
                      >
                        <i class="bx bx-trash"></i>
                      </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif

      </div>
    </div>
  </div>

  @push('styles')
    {{-- DataTables CSS básico --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    
    {{-- Boxicons (ícones bx-*) --}}
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    {{-- FontAwesome (ícone de rede) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  @endpush

  @push('scripts')
    {{-- jQuery (precisa vir antes do DataTables) --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- DataTables Core --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    {{-- Botões do DataTables --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    {{-- Dependências para Excel/PDF --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    {{-- SweetAlert2 para confirmações --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(document).ready(function () {
        // Inicializar DataTable com Botões completos
        $('#tabela-planos').DataTable({
          paging: true,
          searching: true,
          responsive: true,
          language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
          },
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'copy',
              text: '<i class="bx bx-copy"></i> Copiar',
              className: 'btn btn-secondary me-1'
            },
            {
              extend: 'excel',
              text: '<i class="bx bxl-microsoft"></i> Excel',
              className: 'btn btn-success '
            },
            {
              extend: 'pdf',
              text: '<i class="bx bxs-file-pdf"></i> PDF',
              className: 'btn btn-danger '
            },
            {
              extend: 'print',
              text: '<i class="bx bx-printer"></i> Imprimir',
              className: 'btn btn-info'
            }
          ],
          columnDefs: [
            { targets: -1, orderable: false, searchable: false }
          ]
        });

        // Confirmação de exclusão via SweetAlert
        $(document).on('click', '.btn-delete-plano', async function () {
          const url = $(this).data('url');
          const nome = $(this).data('nome');

          const result = await Swal.fire({
            title: `Excluir plano "${nome}"?`,
            text: "Esta ação não poderá ser desfeita.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar'
          });

          if (!result.isConfirmed) return;

          try {
            const response = await fetch(url, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
              }
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
              throw new Error(data.message || 'Erro ao excluir');
            }

            await Swal.fire({
              icon: 'success',
              title: 'Plano excluído com sucesso!',
              timer: 1500,
              showConfirmButton: false
            });

            $('#tabela-planos').DataTable()
              .row($(this).parents('tr'))
              .remove()
              .draw(false);
          } catch (err) {
            console.error(err);
            Swal.fire('Erro', err.message || 'Falha ao excluir plano', 'error');
          }
        });
      });
    </script>
  @endpush
</x-app-layout>
