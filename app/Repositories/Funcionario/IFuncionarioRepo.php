<?php

namespace App\Repositories\Funcionario;

use App\Models\Funcionario;

interface IFuncionarioRepo
{
    public function createFuncionario(array $data): Funcionario;

    public function findFuncionarioById(int $id): ?Funcionario;

    public function getAllFuncionarios();
}