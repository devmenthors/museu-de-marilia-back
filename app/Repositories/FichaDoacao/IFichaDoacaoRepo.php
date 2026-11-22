<?php

namespace App\Repositories\FichaDoacao;

use App\Models\FichaDoacao;

interface IFichaDoacaoRepo
{
    public function createFichaDoacao(array $data): FichaDoacao;

    public function findFichaDoacaoById(int $id): ?FichaDoacao;

    public function updateFichaDoacao(int $id, array $data): int;

    public function deleteFichaDoacao(int $id): ?FichaDoacao;

    public function getAllFichas();
}