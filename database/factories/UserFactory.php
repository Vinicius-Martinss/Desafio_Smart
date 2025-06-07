<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    private function generateCpf()
{
    $n = 9;
    $n1 = rand(0, $n);
    $n2 = rand(0, $n);
    $n3 = rand(0, $n);
    $n4 = rand(0, $n);
    $n5 = rand(0, $n);
    $n6 = rand(0, $n);
    $n7 = rand(0, $n);
    $n8 = rand(0, $n);
    $n9 = rand(0, $n);

    $d1 = $n9*2 + $n8*3 + $n7*4 + $n6*5 + $n5*6 + $n4*7 + $n3*8 + $n2*9 + $n1*10;
    $d1 = 11 - ($d1 % 11);
    if ($d1 >= 10) $d1 = 0;

    $d2 = $d1*2 + $n9*3 + $n8*4 + $n7*5 + $n6*6 + $n5*7 + $n4*8 + $n3*9 + $n2*10 + $n1*11;
    $d2 = 11 - ($d2 % 11);
    if ($d2 >= 10) $d2 = 0;

    return "$n1$n2$n3.$n4$n5$n6.$n7$n8$n9-$d1$d2";
}

    public function definition()
    {
        $faker = $this->faker;
    $faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'cpf' => $this->generateCpf(),
            'data_nascimento' => $this->faker->date(),
            'genero' => $this->faker->randomElement(['M', 'F']),
            'telefone' => $this->faker->phoneNumber(),
            'cep' => $this->faker->postcode(),
            'logradouro' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->secondaryAddress(),
            'bairro' => $this->faker->word(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->randomElement(['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES',
    'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS',
    'RO', 'RR', 'SC', 'SP', 'SE', 'TO']),
            'is_admin' => false,
            'profile_photo_path' => $this->faker->imageUrl(),
            'nome_empresa' => $this->faker->company(),
        ];
    }
}
