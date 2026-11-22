<?php

namespace App\Services;

use App\Models\Exposicao;
use App\Repositories\Exposicoes\ExposicoesRepo;

class ExposicaoService
{
    public function __construct(
        private readonly ExposicoesRepo $exposicaoRepo
    )
    {}

    public function createExposicao(array $data): Exposicao {
        return $this->exposicaoRepo->createExposicao($data);
    }

    public function updateExposicao(int $id, array $data): Exposicao {
        return $this->exposicaoRepo->updateExposicao($id, $data);
    }

    public function deleteExposicao(int $id): Exposicao {
        return $this->exposicaoRepo->deleteExposicao($id);
    }

    public function getAllExposicao() {
        return $this->exposicaoRepo->getAllExposicao();
    }

    public function findExposicaoById(int $id): Exposicao {
        return $this->exposicaoRepo->findExposicaoById($id);
    }
}