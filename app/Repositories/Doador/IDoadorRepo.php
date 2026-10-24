<?php

namespace App\Repositories\Doador;

use App\Models\Doador;

interface IDoadorRepo
{
    public function createDoador(array $data): Doador;

    public function findDoadorById(int $id): ?Doador;

    public function getAllDoadores();
}