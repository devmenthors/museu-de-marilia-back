<?php

namespace App\Repositories\Descartado;

use App\Models\Descartado;

interface IDescartadoRepo
{
    public function createDescartado(array $data): Descartado;

    public function getAllDescartados();

    public function findDescartadoById(int $id): Descartado;
    
    public function updateDescartado(int $id, array $data): Descartado;

    public function deleteDescartado(int $id): Descartado;
    
}

