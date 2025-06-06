<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Team;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Atualiza ou cria o usuário administrador
        $admin = User::updateOrCreate(
            ['email' => 'admin@smart.com'],
            [
                'name'             => 'Administrador',
                'password'         => Hash::make('123'),
                'is_admin'         => true,
                'cpf'              => '000.000.000-00',
                'data_nascimento'  => '1990-01-01',
                'genero'           => 'M',
                'telefone'         => '11999999999',
                'cep'              => '62870-000',
                'logradouro'       => 'Rua poeta Jose Martins',
                'numero'           => '658',
                'bairro'           => 'Centro',
                'cidade'           => 'Pacajus',
                'estado'           => 'CE',
            ]
        );

        // Se não tiver um time pessoal, cria um
        if (! $admin->ownedTeams()->exists()) {
            $team = Team::create([
                'user_id'       => $admin->id,
                'name'          => 'Time do Admin',
                'personal_team' => true,
            ]);

            $admin->current_team_id = $team->id;
            $admin->save();
        }
    }
}
