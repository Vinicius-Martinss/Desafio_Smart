<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plano;
use App\Models\User;

class PlanoSeeder extends Seeder
{
    public function run()
    {
        // Recupera todos os usuários existentes
        $users = User::all();

        // Verifica se há usuários disponíveis
        if ($users->isEmpty()) {
            $this->command->info('Nenhum usuário encontrado. Execute o seeder de usuários primeiro.');
            return;
        }

        // Para cada usuário, cria um plano associado
        foreach ($users as $user) {
            Plano::create([
                'nome' => 'Plano Básico',
                'velocidade' => 50,
                'preco' => 49.99,
                'descricao' => 'Plano de 50Mbps',
                'status' => 'ativo',
                'user_id' => $user->id, // Associa o plano ao usuário
            ]);
        }
    }
}
