<?php

namespace App\Repositories\FichaRegistro;

use App\Models\FichaRegistroAcervo;
use App\Repositories\FichaRegistro\IFichaRegistroRepo;

class FichaRegistroRepo implements IFichaRegistroRepo
{
    public function createFichaRegistro(array $data): FichaRegistroAcervo
    {
        return FichaRegistroAcervo::create($data);
    }

    public function findFichaRegistroById(int $id): ?FichaRegistroAcervo
    {
        return FichaRegistroAcervo::find($id);
    }

    public function getAllFichaRegistros()
    {
        return FichaRegistroAcervo::all();
    }
}