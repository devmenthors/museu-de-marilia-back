<?php

namespace App\Services;

use App\Models\FichaDoacao;
use App\Repositories\FichaDoacao\IFichaDoacaoRepo;
use App\Repositories\Pessoa\IPessoaRepo;

class FichaDoacaoService
{
    public function __construct(
        private readonly IFichaDoacaoRepo $fichaDoacaoRepo,
        private readonly IPessoaRepo $pessoaRepo
        )
    {}

    public function getAllFichas()
    {
        return $this->fichaDoacaoRepo->getAllFichas();
    }

    public function findFichaDoacaoById(int $id): ?FichaDoacao
    {
        return $this->fichaDoacaoRepo->findFichaDoacaoById($id);
    }

    public function updateFichaDoacao(int $id, array $data): int
    {
        return $this->fichaDoacaoRepo->updateFichaDoacao($id, $data);
    }

    public function deleteFichaDoacao(int $id): FichaDoacao
    {
        return $this->fichaDoacaoRepo->deleteFichaDoacao($id);
    }

    public function createFichaDoacao(array $data): FichaDoacao
    {
        $doador = $this->pessoaRepo->findDoadorByCpf($data['doador_id'])->doador; // vem como cpf do controller

        if (!$doador) {
            throw new \Exception('Esse CPF não está cadastrado');
        }

        $data['doador_id'] = $doador->doador_id;

        return $this->fichaDoacaoRepo->createFichaDoacao($data);
    }
}