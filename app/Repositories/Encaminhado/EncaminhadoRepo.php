<?php

namespace App\Repositories\Encaminhado;

use App\Models\Emprestado;
use App\Repositories\Encaminhado\IEncaminhadoRepo;
use Override;

class EncaminhadoRepo implements IEncaminhadoRepo
{
    public function createEmprestado(array $data): Emprestado
    {
        return Emprestado::query()->create($data);
    }

    public function updateEmprestado(int $id, array $data): Emprestado
    {
        $emprestado = Emprestado::query()->find($id);
        $emprestado->update($data);

        return $emprestado;
    }

    public function deleteEmprestado(int $id): Emprestado
    {
        $emprestado = Emprestado::query()->find($id);
        $emprestado->delete();

        return $emprestado;
    }

    public function getAllEmprestados()
    {
        return Emprestado::query()->get()->all();
    }

    public function findEmprestadoById(int $id): Emprestado
    {
        return Emprestado::query()->find($id);
    }
}