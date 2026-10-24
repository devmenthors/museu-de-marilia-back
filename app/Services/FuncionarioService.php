<?php

namespace App\Services;

use App\Models\Funcionario;
use App\Repositories\Funcionario\IFuncionarioRepo;

class FuncionarioService
{

    public function __construct(
        private readonly IFuncionarioRepo $funcionarioRepo
    )
    {}

    public function createFuncionario(array $data): Funcionario
    {
        return $this->funcionarioRepo->createFuncionario($data);
    }

    public function findFuncionarioById(int $id): ?Funcionario
    {
        return $this->funcionarioRepo->findFuncionarioById($id);
    }

    public function getAllFuncionarios()
    {
        return $this->funcionarioRepo->getAllFuncionarios();
    }
}
