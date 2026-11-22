<?php

namespace App\Repositories\ReservaTecnica;

use App\Models\ReservaTecnica;

interface IReservaTecnicaRepo
{
    public function createReservaTecnica(array $data): ReservaTecnica;

    public function getAllReservasTecnica();

    public function findReservaTecnicaById(int $id): ReservaTecnica;
    
    public function updateReservaTecnica(int $id, array $data): ReservaTecnica;

    public function deleteReservaTecnica(int $id): ReservaTecnica;
}

