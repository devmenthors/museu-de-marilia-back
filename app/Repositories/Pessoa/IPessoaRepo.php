<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa;

interface IPessoaRepo
{
    public function createPessoa(array $data): Pessoa;

    public function findPessoaByCpf(string $cpf): ?Pessoa;

    public function getAllPessoas();
}