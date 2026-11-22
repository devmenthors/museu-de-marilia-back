<?php

namespace Database\Factories;

use App\Enums\Categoria;
use App\Enums\EstadoConservacao;
use App\Enums\ItemStatus;
use App\Models\Doador;
use App\Models\FichaDoacao as ModelsFichaDoacao;
use App\Models\Funcionario;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FichaDoacao>
 */
class FichaDoacaoFactory extends Factory
{
    public function definition(): array
    {
        $fakerBr = \Faker\Factory::create('pt_BR');

        /*
        'dt_incorporacao', 
        'estado_conservacao',
        'qnt_itens',
        'cor',
        'altura',
        'largura',
        'descricao',
        'status_atual', 
        'funcionario_id',
        'doador_id',
        'dt_recebimento',
        'confirmado_em',
        */
        return [
            'codigo_protocolo' => substr($this->faker->uuid() . $this->faker->word(), 0, 40),
            'categoria_acervo' => $this->faker->randomElement(Categoria::cases()),
            'estado_conservacao' => $this->faker->randomElement(EstadoConservacao::cases()),
            'qnt_itens' => $fakerBr->numberBetween(1, 21),

            'cor' => $fakerBr->colorName(),
            'altura' => $fakerBr->numberBetween(0, 1),
            'largura' => $fakerBr->numberBetween(0, 1),
            'descricao' => $fakerBr->sentence(),
            'status_atual' => null,
            
            'dt_recebimento' => $fakerBr->date(),
            'dt_incorporacao' => $fakerBr->dateTime(),
            'confirmado_em' => $fakerBr->dateTime(),

            'funcionario_id' => $this->faker->randomElement(Funcionario::all()->pluck('funcionario_id')->toArray()) ?: Pessoa::factory()->asFuncionario()->create(),
            'doador_id' => $this->faker->randomElement(Doador::all()->pluck('doador_id')->toArray()) ?: Pessoa::factory()->asDoador()->create(),
        ];
    }
}
