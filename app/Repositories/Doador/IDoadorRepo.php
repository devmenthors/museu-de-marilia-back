<?php

namespace App\Repositories\Doador;

use App\Models\Doador;

interface IDoadorRepo
{
    public function createDoador(array $data): Doador;

    public function findDoadorById(int $id): ?Doador;

    public function getAllDoadores();

    public function updateDoador(int $id, array $data): Doador;

    public function deleteDoador(int $id): Doador;

    public function restaurarDoador(int $id, array $data): Doador;

}