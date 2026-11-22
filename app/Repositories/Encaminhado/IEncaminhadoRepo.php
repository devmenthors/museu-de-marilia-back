<?php

namespace App\Repositories\Encaminhado;

use App\Models\Emprestado;

interface IEncaminhadoRepo // mano eu tenho q deixar um nome só vei, fica nesse ngc de encaminhado e emprestado
{
    public function createEmprestado(array $data): Emprestado;

    public function getAllEmprestados();

    public function findEmprestadoById(int $id): Emprestado;
    
    public function updateEmprestado(int $id, array $data): Emprestado;

    public function deleteEmprestado(int $id): Emprestado;
    
}

