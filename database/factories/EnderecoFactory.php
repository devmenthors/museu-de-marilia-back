<?php

namespace Database\Factories;

use App\Models\Doador;
use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Endereco>
 */
class EnderecoFactory extends Factory
{
    protected $model = Endereco::class;

    public function definition(): array
    {
        $fakerBr = fake('pt_BR');

        return [
            'cep' => $fakerBr->numerify('########'),
            'estado' => $fakerBr->stateAbbr(),
            'cidade' => $fakerBr->city(),
            'bairro' => $fakerBr->word(),
            'logradouro' => $fakerBr->streetName(),
            'numero' => $fakerBr->numberBetween(1, 2500),
            'complemento' => $fakerBr->optional()->words(2, true),
            'doador_id' => Doador::factory(),
        ];
    }
}
