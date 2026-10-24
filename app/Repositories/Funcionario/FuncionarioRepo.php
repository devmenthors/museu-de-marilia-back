<?php

namespace App\Repositories\Funcionario;

use App\Models\Funcionario;
use App\Repositories\Funcionario\IFuncionarioRepo;

class FuncionarioRepo implements IFuncionarioRepo
{
    public function createFuncionario(array $data): Funcionario
    {
        // criar lógica de criar primeiro Pessoa, dps Funcionario q belongsTo Pessoa, talvez chamando um Repo aqui dentro? sla 
        return Funcionario::create($data);
    }

    public function findFuncionarioById(int $id): ?Funcionario
    {
        return Funcionario::with('pessoa')->find($id);
    }

    public function getAllFuncionarios()
    {
        return Funcionario::with('pessoa')->get()->all();
    }
}