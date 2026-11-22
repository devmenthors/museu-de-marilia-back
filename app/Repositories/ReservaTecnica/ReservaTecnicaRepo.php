<?php

namespace App\Repositories\ReservaTecnica;

use App\Models\ReservaTecnica;
use Override;

class ReservaTecnicaRepo implements IReservaTecnicaRepo
{
    public function createReservaTecnica(array $data): ReservaTecnica
    {
        return ReservaTecnica::query()->create($data);
    }

    public function updateReservaTecnica(int $id, array $data): ReservaTecnica
    {
        $reserva = ReservaTecnica::query()->findOrFail($id);
        $reserva->update($data);

        return $reserva;
    }

    public function getAllReservasTecnica()
    {
        return ReservaTecnica::query()->get()->all();
    }

    public function findReservaTecnicaById(int $id): ReservaTecnica
    {
        return ReservaTecnica::query()->find($id);
    }

    public function deleteReservaTecnica(int $id): ReservaTecnica
    {
        $reserva = ReservaTecnica::query()->findOrFail($id);
        $reserva->delete();

        return $reserva;
    }
}