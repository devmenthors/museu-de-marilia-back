<?php

namespace App\Repositories\Doacao;

use App\Models\Doacao;

interface IDoacaoRepo
{
    public function createDoacao(array $data): Doacao;

    public function findDoacaoById(int $id): ?Doacao;

    public function getAllDoacoes();
}