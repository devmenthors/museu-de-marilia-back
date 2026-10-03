<?php

namespace App\Repositories\Endereco;

use App\Models\Endereco;

interface IEnderecoRepo
{
    public function getAllEnderecos();

    public function findEnderecoById(int $id): ?Endereco;

    public function createEndereco(array $data): Endereco;
}
