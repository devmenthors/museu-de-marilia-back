<?php

namespace App\Services;

use App\Models\FichaRegistroAcervo;
use App\Repositories\FichaRegistro\IFichaRegistroRepo;

class FichaRegistroService
{
    public function __construct(
        private readonly IFichaRegistroRepo $fichaRegistrosRepo)
    {}

    public function getAllFichaRegistros()
    {
        return $this->fichaRegistrosRepo->getAllFichaRegistros();
    }

    public function findFichaRegistroById(int $id): ?FichaRegistroAcervo
    {
        return $this->fichaRegistrosRepo->findFichaRegistroById($id);
    }

    public function createFichaRegistro(array $data): FichaRegistroAcervo
    {
        return $this->fichaRegistrosRepo->createFichaRegistro($data);
    }
}