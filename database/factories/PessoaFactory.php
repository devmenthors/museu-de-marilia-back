<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\Funcionario;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<Pessoa>
 */
class PessoaFactory extends Factory
{
    protected $model = Pessoa::class;
    public function definition(): array
    {
        $fakerBr = fake('pt_BR');

        return [
            'cpf' => $fakerBr->cpf(false), // O parâmetro false já retorna sem pontos e traço
            'nome_pessoa' => $fakerBr->name(),
            'email' => $fakerBr->unique()->safeEmail(),
        ];
    }

}
