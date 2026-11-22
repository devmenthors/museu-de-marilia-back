<?php

namespace App\Observers;

use App\Enums\ItemStatus;
use App\Enums\StatusDetailType;
use App\Models\ReservaTecnica;
use App\Models\StatusItemLog;

class ReservaTecnicaObserver
{
    public function created(ReservaTecnica $reserva): void 
    {
        $detail_type = StatusDetailType::ReservaTecnica;
        $ficha = $reserva->ficha;

        StatusItemLog::query()->create([
            'ficha_doacao_id' => $reserva->ficha_doacao_id,
            'from_status' => $ficha->status_atual,
            'to_status' => ItemStatus::ReservaTecnica,
            'status_detail_type' => $detail_type,
            'status_detail_id' => $reserva->reserva_id,
            'funcionario_id' => 1, //Auth::id(); MUDAR ISSO DEPOIS QUE O AUTH FOR ADICIONADO
        ]);

        $ficha?->updateQuietly([
            'status_atual' => ItemStatus::ReservaTecnica,
        ]);
    }
}
