<?php

namespace Database\Factories;

use App\Models\Doacao;
use App\Models\Fluxo;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fluxo>
 */
class FluxoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descricao' => $this->faker->words(4, true),
            'data_criado' => $this->faker->date('Y-m-d H:i:s', strtotime('now')),
            'codigo_protocolo' => $this->faker->randomElement(Doacao::all()->pluck('codigo_protocolo')->toArray()),
            'status_id' => $this->faker->randomElement(Status::all()->pluck('status_id')->toArray()),
        ];
    }
}
