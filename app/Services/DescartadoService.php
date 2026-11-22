<?php

namespace App\Services;

use App\Models\Descartado;
use App\Repositories\Descartado\DescartadoRepo;

class DescartadoService
{
    public function __construct(
        private readonly DescartadoRepo $descartadoRepo
    )
    {}

    public function createDescartado(array $data): Descartado {
        return $this->descartadoRepo->createDescartado($data);
    }

    public function updateDescartado(int $id, array $data): Descartado {
        return $this->descartadoRepo->updateDescartado($id, $data);
    }

    public function deleteDescartado(int $id): Descartado {
        return $this->descartadoRepo->deleteDescartado($id);
    }

    public function getAllDescartado() {
        return $this->descartadoRepo->getAllDescartados();
    }

    public function findDescartadoById(int $id): Descartado {
        return $this->descartadoRepo->findDescartadoById($id);
    }
}