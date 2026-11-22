<?php

namespace App\Repositories\Descartado;

use App\Models\Descartado;
use App\Repositories\Descartado\IDescartadoRepo;
use Override;

class DescartadoRepo implements IDescartadoRepo
{
    public function createDescartado(array $data): Descartado
    {
        return Descartado::query()->create($data);
    }   

    public function updateDescartado(int $id, array $data): Descartado
    {
        $descartado = Descartado::query()->find($id);
        $descartado->update($data);

        return $descartado;
    }

    public function deleteDescartado(int $id): Descartado
    {
        $descartado = Descartado::query()->find($id);
        $descartado->delete();

        return $descartado;
    }

    public function getAllDescartados()
    {
        return Descartado::query()->get()->all();
    }

    public function findDescartadoById(int $id): Descartado
    {
        return Descartado::query()->find($id);
    }
}