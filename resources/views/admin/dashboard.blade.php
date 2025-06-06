<x-app-layout>
    <x-slot name="header">
      <h2 class="text-xl font-semibold text-gray-800 leading-tight">Dashboard do Administrador</h2>
    </x-slot>
  
    <div class="py-8 max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-6">
      <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-lg font-semibold text-gray-600">Total de Usuários</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalUsers }}</p>
      </div>
  
      <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-lg font-semibold text-gray-600">Planos Ativos</h3>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $activePlans }}</p>
      </div>
    </div>
  </x-app-layout>
  