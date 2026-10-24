<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Endereco>
 */
class EnderecoFactory extends Factory
{
    public function definition(): array
    {
        $fakerBr = \Faker\Factory::create('pt_BR');
        return [
            'cep' => str_replace('-', '', $fakerBr->postcode),
            'estado' => $fakerBr->state,
            'cidade' => $fakerBr->city,
            'bairro' => $fakerBr->text(15),
            'logradouro' => $fakerBr->streetName,
            'numero' => $this->faker->numberBetween(1, 250),
            'complemento' => $this->faker->words(2, true),
        ];
    }
}
