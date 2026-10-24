<?php

namespace App\Repositories\FichaRegistro;

use App\Models\FichaRegistroAcervo;

interface IFichaRegistroRepo
{
    public function createFichaRegistro(array $data): FichaRegistroAcervo;

    public function findFichaRegistroById(int $id): ?FichaRegistroAcervo;

    public function getAllFichaRegistros();
}