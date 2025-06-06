<div class="flex space-x-2">
    <a href="{{ route('admin.planos.edit', $plano) }}" class="text-blue-600 underline">Editar</a>
    <button class="btn-delete-plano text-red-600 underline"
            data-url="{{ route('admin.planos.destroy', $plano) }}"
            data-nome="{{ $plano->name }}">
      Excluir
    </button>
  </div>
  