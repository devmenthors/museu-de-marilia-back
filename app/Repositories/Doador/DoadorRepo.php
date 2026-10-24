<?php

namespace App\Repositories\Doador;

use App\Models\Doador;
use App\Repositories\Doador\IDoadorRepo;

class DoadorRepo implements IDoadorRepo
{
    public function createDoador(array $data): Doador
    {
        return Doador::create($data);
    }

    public function findDoadorById(int $id): ?Doador
    {
        return Doador::find($id);
    }

    public function getAllDoadores()
    {
        return Doador::all();
    }
}