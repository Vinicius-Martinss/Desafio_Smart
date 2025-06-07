<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Plano;

class UserTeamSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $team = Team::factory()->create();
            $user = User::factory()->create([
                'current_team_id' => $team->id,
            ]);
            $team->users()->attach($user);

            // Criar planos associados ao usuário
            Plano::factory()->count(2)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
