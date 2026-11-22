<?php

namespace App\Observers;

use App\Enums\ItemStatus;
use App\Enums\StatusDetailType;
use App\Models\Exposicao;
use App\Models\StatusItemLog;

class ExposicoesObserver
{
    public function created(Exposicao $exposicao): void
    {
        $detail_type = StatusDetailType::Exposto;
        $ficha = $exposicao->ficha;

        StatusItemLog::query()->create([
            'ficha_doacao_id' => $exposicao->ficha_doacao_id,
            'from_status' => $ficha->status_atual,
            'to_status' => ItemStatus::Exposto,
            'status_detail_type' => $detail_type,
            'status_detail_id' => $exposicao->exposicao_id,
            'funcionario_id' => 1, //Auth::id(); MUDAR ISSO DEPOIS QUE O AUTH FOR ADICIONADO
        ]);

        $ficha?->updateQuietly([
            'status_atual' => ItemStatus::Exposto,
        ]);
    }
}
