<?php

namespace App\Services;

use App\Models\Emprestado;
use App\Repositories\Encaminhado\EncaminhadoRepo;

class EncaminhadoService
{
    public function __construct(
        private readonly EncaminhadoRepo $encaminhadoRepo
    )
    {}

    public function createEncaminhado(array $data): Emprestado {
        return $this->encaminhadoRepo->createEmprestado($data);
    }

    public function updateEncaminhado(int $id, array $data): Emprestado {
        return $this->encaminhadoRepo->updateEmprestado($id, $data);
    }

    public function deleteEncaminhado(int $id): Emprestado {
        return $this->encaminhadoRepo->deleteEmprestado($id);
    }

    public function getAllEncaminhado() {
        return $this->encaminhadoRepo->getAllEmprestados();
    }

    public function findEncaminhadoById(int $id): Emprestado {
        return $this->encaminhadoRepo->findEmprestadoById($id);
    }
}