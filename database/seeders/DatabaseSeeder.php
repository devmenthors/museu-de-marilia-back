<?php

namespace Database\Seeders;

use App\Models\Doacao;
use App\Models\Endereco;
use App\Models\Fluxo;
use App\Models\Pessoa;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run(): void
    {

        /* CRIANDO STATUS PADRÃO */
        Status::query()->create([ 'nm_status' => 'Em Análise' ]);
        Status::query()->create([ 'nm_status' => 'Aguardando Documentação' ]);
        Status::query()->create([ 'nm_status' => 'Aprovado para Incorporação' ]);
        Status::query()->create([ 'nm_status' => 'Não Incorporado' ]);
        Status::query()->create([ 'nm_status' => 'Encaminhado' ]);


        Endereco::factory()->count(20)->create();
        Pessoa::factory()->count(10)->asDoador()->create();
        Pessoa::factory()->count(5)->asFuncionario()->create();
        Pessoa::factory()->create();

        Doacao::factory(5)->create();
        Fluxo::factory(3)->create();

    }
}
