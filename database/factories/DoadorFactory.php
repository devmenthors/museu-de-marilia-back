<?php

namespace Database\Factories;

use App\Models\Doador;
use App\Models\Endereco;
use App\Models\Funcionario;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Doador>
 */
class DoadorFactory extends Factory
{
    protected $model = Doador::class;

    public function definition(): array
    {
        return [
            'pessoa_id' => Pessoa::factory(),
            'funcionario_id' => fn () => Funcionario::inRandomOrder()->value('funcionario_id') 
                ?? Funcionario::factory()->create()->funcionario_id,
            'telefone' => fake('pt_BR')->numerify('###########'),
        ];
    }

}
