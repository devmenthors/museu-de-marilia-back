<?php

namespace App\Observers;

use App\Enums\ItemStatus;
use App\Enums\StatusDetailType;
use App\Models\Descartado;
use App\Models\StatusItemLog;

class DescartadosObserver
{
    public function created(Descartado $descartado): void
    {
        $detail_type = StatusDetailType::Descartado;
        $ficha = $descartado->ficha;

        StatusItemLog::query()->create([
            'ficha_doacao_id' => $descartado->ficha_doacao_id,
            'from_status' => $ficha->status_atual,
            'to_status' => ItemStatus::Descartado,
            'status_detail_type' => $detail_type,
            'status_detail_id' => $descartado->descartado_id,
            'funcionario_id' => 1, //Auth::id(); MUDAR ISSO DEPOIS QUE O AUTH FOR ADICIONADO
        ]);

        $ficha?->updateQuietly([
            'status_atual' => ItemStatus::Descartado,
        ]);
    }
}
