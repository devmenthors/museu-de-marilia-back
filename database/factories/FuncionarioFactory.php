<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\Funcionario;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Funcionario>
 */
class FuncionarioFactory extends Factory
{
    protected $model = Funcionario::class;

    public function definition(): array
    {
        return [
            'pessoa_id' => Pessoa::factory(),
            'senha' => bcrypt('123456'),
        ];
    }
}
