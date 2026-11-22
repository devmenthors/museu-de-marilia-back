<?php

namespace App\Repositories\Endereco;

use App\Models\Endereco;

interface IEnderecoRepo
{
    public function getAllEnderecos(int $doador_id);

    public function findEnderecoById(int $doador_id, int $id): ?Endereco;

    public function createEndereco(array $data): Endereco;

    public function updateEndereco(int $id, array $data): Endereco;

    public function deleteEndereco(int $id, array $data): Endereco;
}
