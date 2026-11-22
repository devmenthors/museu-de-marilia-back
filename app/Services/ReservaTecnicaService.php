<?php

namespace App\Services;

use App\Models\ReservaTecnica;
use App\Repositories\ReservaTecnica\ReservaTecnicaRepo;

class ReservaTecnicaService
{
    public function __construct(
        private readonly ReservaTecnicaRepo $reservaRepo
    )
    {}

    public function createReservaTecnica(array $data): ReservaTecnica {
        return $this->reservaRepo->createReservaTecnica($data);
    }

    public function updateReservaTecnica(int $id, array $data): ReservaTecnica {
        return $this->reservaRepo->updateReservaTecnica($id, $data);
    }

    public function deleteReservaTecnica(int $id): ReservaTecnica { // fato é, se pa nem precisa
        /* sabe pq? pq os observers do laravel já vão fazer o favor de mudar automático
            dai se eu quiser mt usar um delete dai da pra mandar pra descartado automatico
            sem justificativa, mas vou deixar dps o pessoal do front ve oq faz ou o andrezao da um salve
        */
        return $this->reservaRepo->deleteReservaTecnica($id);
    }

    public function getAllReservasTecnica() {
        return $this->reservaRepo->getAllReservasTecnica();
    }

    public function findReservaTecnicaById(int $id): ReservaTecnica {
        return $this->reservaRepo->findReservaTecnicaById($id);
    }
}