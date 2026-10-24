<?php

namespace App\Repositories\Fluxo;

use App\Models\Fluxo;
use App\Repositories\Fluxo\IFluxoRepo;

class FluxoRepo implements IFluxoRepo
{
    public function createFluxo(array $data): Fluxo
    {
        return Fluxo::create($data);
    }

    public function findFluxoById(int $id): ?Fluxo
    {
        return Fluxo::with('status')->find($id);
    }

    public function getAllFluxos()
    {
        return Fluxo::with('status')->get()->all();
    }
}