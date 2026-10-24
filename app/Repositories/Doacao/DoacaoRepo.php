<?php

namespace App\Repositories\Doacao;

use App\Models\Doacao;
use App\Repositories\Doacao\IDoacaoRepo;

class DoacaoRepo implements IDoacaoRepo
{
    public function createDoacao(array $data): Doacao
    {
        return Doacao::create($data);
    }

    public function findDoacaoById(int $id): ?Doacao
    {
        return Doacao::find($id);
    }

    public function getAllDoacoes()
    {
        return Doacao::all();
    }
}