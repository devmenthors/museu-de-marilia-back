<?php

namespace App\Repositories\Funcionario;

use App\Models\Funcionario;

interface IFuncionarioRepo
{
    public function createFuncionario(array $data): Funcionario;

    public function findFuncionarioById(int $id): ?Funcionario;

    public function getAllFuncionarios();

    public function updateFuncionario(int $id, array $data): Funcionario;

    public function deleteFuncionario(int $id): Funcionario;

    public function restaurarFuncionario(int $id, array $data): Funcionario;
}