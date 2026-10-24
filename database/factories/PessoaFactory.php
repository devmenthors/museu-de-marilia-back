<?php

namespace Database\Factories;

use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pessoa>
 */
class PessoaFactory extends Factory
{
    protected $model = Pessoa::class;
    public function definition(): array
    {
        $fakerBr = \Faker\Factory::create('pt_BR');
        return [
            'cpf' => str_replace(['.','-'], '', $fakerBr->cpf),
            'nome_pessoa' => $fakerBr->name,
            'email' => $fakerBr->email,
            'endereco_id' => $this->faker->randomElement(Endereco::all()->pluck('id')->toArray()),
        ];
    }

    public function asFuncionario(): static
    {
        return $this->afterCreating(function (Pessoa $pessoa) {
            \DB::table('funcionarios')->insert([
                'pessoa_cpf' => $pessoa->cpf,
                'senha' => bcrypt($this->faker->password(4, 10)),
            ]);
        });
    }

    public function asDoador(): static
    {
        return $this->afterCreating(function (Pessoa $pessoa) {
            $fakerBr = \Faker\Factory::create('pt_BR');
            \DB::table('doadores')->insert([
                'cpf' => $pessoa->cpf,
                'telefone' => str_replace(['(',')',' ', '-'], '', $fakerBr->phoneNumber),
            ]);
        });
    }
}
