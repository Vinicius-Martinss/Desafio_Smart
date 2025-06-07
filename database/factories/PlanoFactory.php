<?php
namespace Database\Factories;

use App\Models\Plano;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


class PlanoFactory extends Factory
{
    protected $model = Plano::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'velocidade' => $this->faker->randomElement([50, 100, 200, 500]),
            'preco' => $this->faker->randomFloat(2, 50, 300),
            'descricao' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['ativo', 'inativo']),
            'user_id' => null, // Será atribuído no seeder
            'team_id' => null, // Será atribuído no seeder
        ];
    }
}
