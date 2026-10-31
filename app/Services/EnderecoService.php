<?php

namespace App\Services;

use App\Models\Endereco;
use App\Repositories\Doador\IDoadorRepo;
use App\Repositories\Endereco\IEnderecoRepo;
use App\Repositories\Pessoa\IPessoaRepo;
use Exception;
use Illuminate\Support\Facades\Http;

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
