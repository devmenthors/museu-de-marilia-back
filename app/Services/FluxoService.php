<?php

namespace App\Services;

use App\Models\Fluxo;
use App\Repositories\Fluxo\IFluxoRepo;

class FluxoService
{
    public function __construct(
        private readonly IFluxoRepo $fluxoRepo
    )
    {}

    public function getAllFluxos()
    {
        return $this->fluxoRepo->getAllFluxos();
    }

    public function findFluxoById(int $id): ?Fluxo
    {
        return $this->fluxoRepo->findFluxoById($id);
    }

    public function createFluxo(array $data): Fluxo
    {
        return $this->fluxoRepo->createFluxo($data);
    }
} 