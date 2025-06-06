<x-app-layout>
  <div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white p-6 rounded-2xl shadow-md">

        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
          <i class="fas fa-users text-blue-600"></i> Gerenciar Usuários
        </h2>


        @if($users->isEmpty())
          <div class="text-center py-5">
            <h4 class="mb-0">Nenhum usuário cadastrado ainda</h4>
          </div>
        @else
          <div class="table-responsive">
            <table
              id="tabela-usuarios"
              class="table table-striped table-bordered nowrap"
              style="width:100%"
            >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Admin?</th>
                  <th>Criado em</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Sim' : 'Não' }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>
                      <a
                        href="{{ route('admin.usuarios.edit', $user->id) }}"
                        class="btn btn-warning me-1"
                      >
                        <i class="bx bx-edit-alt"></i>
                      </a>
                      <button
                        class="btn btn-danger btn-delete-user"
                        data-url="{{ route('admin.usuarios.destroy', $user->id) }}"
                        data-nome="{{ $user->name }}"
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
    {{-- DataTables CSS --}}
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"
    />

    {{-- Boxicons for bx-* icons --}}
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    {{-- FontAwesome for 🗹 icon --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
  @endpush

  @push('scripts')
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{-- DataTables Core --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    {{-- DataTables Buttons --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    {{-- Dependências para Excel/PDF --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      $(document).ready(function () {
        $('#tabela-usuarios').DataTable({
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
              className: 'btn btn-secondary me-1 shadow-sm'
            },
            {
              extend: 'excel',
              text: '<i class="bx bxl-microsoft"></i> Excel',
              className: 'btn btn-success me-1 shadow-sm'
            },
            {
              extend: 'pdf',
              text: '<i class="bx bxs-file-pdf"></i> PDF',
              className: 'btn btn-danger me-1 shadow-sm'
            },
            {
              extend: 'print',
              text: '<i class="bx bx-printer"></i> Imprimir',
              className: 'btn btn-info shadow-sm'
            }
          ],
          columnDefs: [
            { targets: -1, orderable: false, searchable: false }
          ]
        });

        $(document).on('click', '.btn-delete-user', async function () {
  const url = $(this).data('url');
  const nome = $(this).data('nome');

  const result = await Swal.fire({
    title: `Excluir usuário "${nome}"?`,
    text: "Esta ação não poderá ser desfeita.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#e3342f',
    cancelButtonColor: '#6c757d',
    confirmButtonText: 'Sim, excluir!',
    cancelButtonText: 'Cancelar'
  });

  if (result.isConfirmed) {
    try {
      const response = await fetch(url, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          'Accept': 'application/json'
        }
      });

      const data = await response.json();

      if (data.success) {
        Swal.fire({
          icon: 'success',
          title: 'Sucesso!',
          text: data.message,
          timer: 2000,
          showConfirmButton: false
        }).then(() => {
          location.reload(); // recarrega a tabela
        });
      } else {
        Swal.fire('Erro', data.message || 'Erro ao excluir o usuário.', 'error');
      }
    } catch (error) {
      Swal.fire('Erro', 'Não foi possível excluir o usuário.', 'error');
    }
  }
});
      });
    </script>
  @endpush
</x-app-layout>
