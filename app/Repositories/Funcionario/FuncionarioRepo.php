<?php

namespace App\Repositories\Funcionario;

use App\Models\Funcionario;
use App\Repositories\Funcionario\IFuncionarioRepo;
use Override;

class FuncionarioRepo implements IFuncionarioRepo
{

    public function createFuncionario(array $data): Funcionario
    {
        // criar lógica de criar primeiro Pessoa, dps Funcionario q belongsTo Pessoa, talvez chamando um Repo aqui dentro? sla
        return Funcionario::create($data);
    }

    public function findFuncionarioById(int $id): ?Funcionario
    {
        return Funcionario::with('pessoa')->where('funcionario_id', $id)->first();
    }

    public function findFuncionarioByEmail(string $email): ?Funcionario
    {
        return Funcionario::with('pessoa')->where('email', $email)->first();
    }

    public function getAllFuncionarios()
    {
        return Funcionario::with('pessoa')->get();
    }

    public function updateFuncionario(int $id, array $data): Funcionario
    {
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($data);
        return $funcionario;
    }

    public function deleteFuncionario(int $id): Funcionario
    {
        $funcionario = Funcionario::with('pessoa')->findOrFail($id);
        $funcionario->delete();
        return $funcionario;
    }

    public function restaurarFuncionario(int $id, array $data): Funcionario
    {
        $funcionario = Funcionario::onlyTrashed()->findOrFail($id);
        $funcionario->restore();
        $funcionario->update($data);

        return $funcionario->load('pessoa');
    }
}
