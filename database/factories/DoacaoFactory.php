<?php

namespace Database\Factories;

use App\Models\Doacao;
use App\Models\Doador;
use App\Models\Model;
use App\Models\Pessoa;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Doacao>
 */
class DoacaoFactory extends Factory
{
    public function definition(): array
    {
        $fakerBr = \Faker\Factory::create('pt_BR');

        return [
            'codigo_protocolo' => substr($this->faker->uuid() . $this->faker->word(), 0, 40),
            'historico' => $this->faker->sentence(),
            'justificativa' => $this->faker->sentence(),
            'tip_acervo' => $this->faker->words(3, true),
            'dt_recebimento' => $this->faker->date(),
            'confirmado_em' => $this->faker->date(),

            'pessoa_cpf' => $this->faker->randomElement(Pessoa::all()->pluck('cpf')->toArray()) ?: Pessoa::factory()->create(),

            'doador_cpf' => $this->faker->randomElement(Doador::all()->pluck('cpf')->toArray()) ?: Pessoa::factory()->asDoador()->create(),

            'created_at' => $this->faker->date('Y-m-d H:i:s', strtotime('now')),
        ];
    }
}
