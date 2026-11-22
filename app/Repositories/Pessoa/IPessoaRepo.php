<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa;

interface IPessoaRepo
{
    public function createPessoa(array $data): Pessoa;

    public function findPessoaByCpf(string $cpf): ?Pessoa;

    public function findDoadorByCpf(string $cpf): ?Pessoa;

    public function findFuncionarioByCpf(string $cpf): ?Pessoa;

    public function getAllPessoas();

    public function updatePessoa(int $id, array $data): int;

    public function deletePessoa(int $id): ?Pessoa;
}