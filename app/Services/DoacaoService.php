<?php

namespace App\Services;

use App\Models\Doacao;
use App\Repositories\Doacao\DoacaoRepo;

class DoacaoService
{
    public function __construct(
        private readonly DoacaoRepo $doacoesRepo
    )
    {}

    public function createDoacao(array $data): Doacao
    {
        return $this->doacoesRepo->createDoacao($data);
    }

    public function findDoacaoById(int $id): ?Doacao
    {
        return $this->doacoesRepo->findDoacaoById($id);
    }

    public function getAllDoacoes()
    {
        return $this->doacoesRepo->getAllDoacoes();
    }
}

