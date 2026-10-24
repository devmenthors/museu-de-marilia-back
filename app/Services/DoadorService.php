<?php

namespace App\Services;

use App\Models\Doador;
use App\Repositories\Doador\DoadorRepo;

class DoadorService
{
    public function __construct(
        private readonly DoadorRepo $doadorRepo
    )
    {}

    public function createDoador(array $data): Doador
    {
        return $this->doadorRepo->createDoador($data);
    }

    public function findDoadorById(int $id): ?Doador
    {
        return $this->doadorRepo->findDoadorById($id);
    }

    public function getAllDoadores()
    {
        return $this->doadorRepo->getAllDoadores();
    }
}