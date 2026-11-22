<?php

namespace App\Observers;

use App\Enums\ItemStatus;
use App\Enums\StatusDetailType;
use App\Models\EmAnalise;
use App\Models\StatusItemLog;

class EmAnalisesObserver
{
    public function created(EmAnalise $em_analise): void
    {
        $detail_type = StatusDetailType::EmAnalise;
        $ficha = $em_analise->ficha;

        StatusItemLog::query()->create([
            'ficha_doacao_id' => $em_analise->ficha_doacao_id,
            'from_status' => $ficha->status_atual,
            'to_status' => ItemStatus::EmAnalise,
            'status_detail_type' => $detail_type,
            'status_detail_id' => $em_analise->em_analise_id,
            'funcionario_id' => 1, //Auth::id(); MUDAR ISSO DEPOIS QUE O AUTH FOR ADICIONADO
        ]);

        $ficha?->updateQuietly([
            'status_atual' => ItemStatus::EmAnalise,
        ]);
    }
}
