<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserTeamSeeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            UserTeamSeeder::class,
            PlanoSeeder::class,
        ]);
    }
}