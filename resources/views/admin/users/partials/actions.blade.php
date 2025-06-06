<div class="flex space-x-2">
    <a href="{{ route('admin.usuarios.edit', $user) }}" class="text-blue-600 underline">Editar</a>
    <button class="btn-delete-user text-red-600 underline"
            data-url="{{ route('admin.usuarios.destroy', $user) }}"
            data-nome="{{ $user->name }}">
      Excluir
    </button>
  </div>
  