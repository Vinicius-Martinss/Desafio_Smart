<x-app-layout>
    <x-slot name="headerTitle">Meus Planos</x-slot>
    <x-slot name="headerSub">Gerencie os planos da sua empresa</x-slot>

    <div class="card">
        <div class="card-body">
            {{-- Cabeçalho --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Planos cadastrados</h5>
                <a href="{{ route('planos.create') }}" class="btn btn-primary">
                    <i class="bx bx-plus"></i> Novo Plano
                </a>
            </div>

            @if ($planos->isEmpty())
                <div class="text-center p-5">
                    <h4 class="mb-3">Nenhum plano cadastrado ainda</h4>
                </div>
            @else
                <div class="table-responsive">
                    <table id="tabela-planos" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Velocidade (Mbps)</th>
                                <th>Preço (R$)</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($planos as $plano)
                                <tr>
                                    <td>{{ $plano->nome }}</td>
                                    <td>{{ $plano->velocidade }}</td>
                                    <td>{{ number_format($plano->preco, 2, ',', '.') }}</td>
                                    <td>{{ $plano->descricao }}</td>
                                    <td>
                                        <a href="{{ route('planos.edit', $plano) }}" class="btn  btn-warning me-1">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <button
                                            class="btn btn-danger btn-delete"
                                            data-url="{{ route('planos.destroy', $plano) }}"
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

    @push('styles')
        {{-- Somente o CSS básico do DataTables (sem Buttons) --}}
        <link
          rel="stylesheet"
          href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"
        />
        {{-- Se quiser o estilo Bootstrap 5, pode trocar por:
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
        --}}
    @endpush

    @push('scripts')
    {{-- jQuery (vem sempre antes do DataTables) --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Core do DataTables --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- Botões do DataTables --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    {{-- Dependências dos botões (exportar Excel/PDF) --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script>
        $(document).ready(function () {
            console.log("Tipo de $.fn.DataTable =", typeof $.fn.DataTable);

            $('#tabela-planos').DataTable({
                paging: true,
                searching: true,
                responsive: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json'
                },
                dom: 'Bfrtip', // ADICIONA O DOM COM BOTÕES
                buttons: [
                        {
                            extend: 'copy',
                            text: '<i class="bx bx-copy"></i> Copiar',
                            className: 'btn btn-secondary'
                        },
                        {
                            extend: 'excel',
                            text: '<i class="bx bxl-microsoft"></i> Excel',
                            className: 'btn btn-success'
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="bx bxs-file-pdf"></i> PDF',
                            className: 'btn btn-danger'
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

            // Exclusão com SweetAlert2
            $('.btn-delete').on('click', async function () {
                const url = $(this).data('url');
                const nome = $(this).data('nome');

                const result = a    ({
                    title: `Excluir plano "${nome}"?`,
                    text: "Essa ação não poderá ser desfeita.",
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

                    $('#tabela-planos').DataTable().row($(this).parents('tr')).remove().draw(false);
                } catch (err) {
                    console.error(err);
                    Swal.fire('Erro', err.message || 'Falha ao excluir plano', 'error');
                }
            });
        });
    </script>
@endpush

</x-app-layout>
