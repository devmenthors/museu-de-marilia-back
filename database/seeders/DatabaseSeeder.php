<?php

namespace Database\Seeders;

use App\Models\Doador;
use App\Models\Endereco;
use App\Models\FichaDoacao;
use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Funcionario::factory(5)->create();

        $doadores = Doador::factory(20)->create();

        foreach ($doadores as $doador) {
            Endereco::factory(rand(1, 3))->create([
                'doador_id' => $doador->doador_id,
            ]);
        }

        FichaDoacao::factory(10)->create();
    }
}
