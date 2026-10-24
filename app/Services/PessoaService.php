<?php

namespace App\Services;

use App\Models\Pessoa;
use App\Repositories\Pessoa\PessoaRepo;

class PessoaService
{
    public function __construct(
        private readonly PessoaRepo $pessoaRepo)
    {}

    public function createPessoa(array $data): Pessoa
    {
        return $this->pessoaRepo->createPessoa($data);
    }

    public function findPessoaByCpf(string $cpf): ?Pessoa
    {
        return $this->pessoaRepo->findPessoaByCpf($cpf);
    }

    public function getAllPessoas()
    {
        return $this->pessoaRepo->getAllPessoas();
    }
}