<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa;
use App\Repositories\Pessoa\IPessoaRepo;

class PessoaRepo implements IPessoaRepo
{
    public function createPessoa(array $data): Pessoa
    {
        return Pessoa::create($data);
    }

    public function findPessoaByCpf(string $cpf): ?Pessoa
    {
        return Pessoa::where('cpf', $cpf)->first();
    }

    public function getAllPessoas()
    {
        return Pessoa::all();
    }
}