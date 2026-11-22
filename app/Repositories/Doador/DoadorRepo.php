<?php

namespace App\Repositories\Doador;

use App\Models\Doador;
use App\Repositories\Doador\IDoadorRepo;
use Override;

class DoadorRepo implements IDoadorRepo
{
    public function createDoador(array $data): Doador
    {
        return Doador::create($data);
    }

    public function findDoadorById(int $id): ?Doador
    {
        return Doador::with('pessoa')->find($id);
    }

    public function getAllDoadores()
    {
        return Doador::with('pessoa')->get()->all();
    }

    public function updateDoador(int $id, array $data): Doador
    {
        $doador = Doador::with('pessoa')->findOrFail($id);
        $doador->update($data);
        return $doador;
    }

    public function deleteDoador(int $id): Doador
    {
        $doador = Doador::with('pessoa')->findOrFail($id);
        $doador->delete();
        return $doador;
    }

    public function restaurarDoador(int $id, array $data): Doador
    {
        $doador = Doador::onlyTrashed()->findOrFail($id);
        $doador->restore();
        $doador->update($data);

        return $doador->load('pessoa');
    }
}