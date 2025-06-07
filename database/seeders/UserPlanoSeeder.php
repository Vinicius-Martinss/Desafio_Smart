<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Plano;

class UserPlanoSeeder extends Seeder
{
    public function run()
    {
        $planos = Plano::all();

        User::all()->each(function ($user) use ($planos) {
            $user->plano_id = $planos->random()->id;
            $user->save();
        });
    }
}
