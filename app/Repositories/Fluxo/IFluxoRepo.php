<?php

namespace App\Repositories\Fluxo;

use App\Models\Fluxo;

interface IFluxoRepo
{
    public function createFluxo(array $data): Fluxo;

    public function findFluxoById(int $id): ?Fluxo;

    public function getAllFluxos();
}