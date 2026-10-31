<?php

namespace App\Services;

use App\Models\Endereco;
use App\Repositories\Endereco\IEnderecoRepo;
use Exception;
use Illuminate\Support\Facades\Http;

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

    /* 
        @throws Exception if 'cep' not valid
    */
    public function createEndereco(array $data): Endereco
    {
        $cepValidado = Http::get('https://viacep.com.br/ws/' . (string) $data['cep'] . '/json');
        $response = $cepValidado->json();

        if (isset($response['erro'])) {
            throw new Exception("ERRO: CEP não existe.");
        }

        return $this->enderecosRepo->createEndereco($data);
    }
}