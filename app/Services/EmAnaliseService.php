<?php

namespace App\Services;

use App\Models\EmAnalise;
use App\Repositories\EmAnalise\EmAnaliseRepo;

class EmAnaliseService
{
    public function __construct(
        private readonly EmAnaliseRepo $emAnaliseRepo
    )
    {}

    public function createEmAnalise(array $data): EmAnalise {
        return $this->emAnaliseRepo->createEmAnalise($data);
    }

    public function updateEmAnalise(int $id, array $data): EmAnalise {
        return $this->emAnaliseRepo->updateEmAnalise($id, $data);
    }

    public function deleteEmAnalise(int $id): EmAnalise {
        return $this->emAnaliseRepo->deleteEmAnalise($id);
    }

    public function getAllEmAnalise() {
        return $this->emAnaliseRepo->getAllEmAnalises();
    }

    public function findEmAnaliseById(int $id): EmAnalise {
        return $this->emAnaliseRepo->findEmAnaliseById($id);
    }
}