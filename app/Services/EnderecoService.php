<?php

namespace App\Services;

use App\Models\Endereco;
use App\Repositories\Doador\IDoadorRepo;
use App\Repositories\Endereco\IEnderecoRepo;
use App\Repositories\Pessoa\IPessoaRepo;

class EnderecoService
{
    public function __construct(
        private readonly IEnderecoRepo $enderecosRepo,
        private readonly IPessoaRepo $pessoaRepo
        )
    {}

    public function getAllEnderecos(string $cpf)
    {
        $doador_id = $this->pessoaRepo->findPessoaByCpf($cpf)->doador->doador_id;
        return $this->enderecosRepo->getAllEnderecos($doador_id);
    }

    public function findEnderecoById(string $cpf, int $id): ?Endereco
    {
        $doador_id = $this->pessoaRepo->findPessoaByCpf($cpf)->doador->doador_id;
        return $this->enderecosRepo->findEnderecoById($doador_id, $id);
    }

    public function createEndereco(array $data): Endereco
    {
        return $this->enderecosRepo->createEndereco($data);
    }

}