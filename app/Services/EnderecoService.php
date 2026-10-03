<?php

namespace App\Services;

use App\Models\Endereco;
use App\Repositories\Endereco\IEnderecoRepo;

class EnderecoService
{
    public function __construct(
        private readonly IEnderecoRepo $enderecosRepo)
    {}

    public function getAllEnderecos()
    {
        return $this->enderecosRepo->getAllEnderecos();
    }

    public function findEnderecoById(int $id): ?Endereco
    {
        return $this->enderecosRepo->findEnderecoById($id);
    }

    public function createEndereco(array $data): Endereco
    {
        return $this->enderecosRepo->createEndereco($data);
    }
}