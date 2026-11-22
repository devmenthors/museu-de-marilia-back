<?php

namespace App\Repositories\Pessoa;

use App\Models\Pessoa;
use App\Repositories\Pessoa\IPessoaRepo;
use Override;

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

    public function findDoadorByCpf(string $cpf): ?Pessoa
    {
        return Pessoa::where('cpf', $cpf)->whereHas('doador')->first();
    }

    public function findFuncionarioByCpf(string $cpf): ?Pessoa
    {
        return Pessoa::where('cpf', $cpf)->whereHas('funcionario')->first();
    }

    public function updatePessoa(int $id, array $data): int
    {
        return Pessoa::query()->where('pessoa_id', $id)->update($data);
    }

    public function deletePessoa(int $id): ?Pessoa
    {
        return Pessoa::query()->where('pessoa_id', $id)->delete();
    }
}