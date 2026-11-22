<?php

namespace App\Observers;

use App\Enums\ItemStatus;
use App\Enums\StatusDetailType;
use App\Models\EmAnalise;
use App\Models\FichaDoacao;
use App\Models\StatusItemLog;
use Illuminate\Support\Facades\Auth;

class FichaDoacaoObserver
{
    public function created(FichaDoacao $ficha_doacao): void
    {
        $detail_type = StatusDetailType::EmAnalise;

        $novolog = StatusItemLog::query()->create([
            'funcionario_id' =>  1/*Auth::id()*/,
            'ficha_doacao_id' => $ficha_doacao->ficha_doacao_id,
            'from_status' => null,
            'to_status' => ItemStatus::EmAnalise,
            'status_detail_type' => $detail_type,
            'status_detail_id' => null,
        ]);

        // nova ficha = novo em análise

        $em_analise = EmAnalise::query()->createQuietly([
            'parecer_tec' => null,
            'apto_incorporado' => null,
            'apto_exposicao' => null,
            'obs_laudo' => null,
            'aprovado' => null,
            'ficha_doacao_id' => $ficha_doacao->ficha_doacao_id
        ]);

        $novolog->updateQuietly([
            'status_detail_id' => $em_analise->em_analise_id
        ]);

        $ficha_doacao->updateQuietly([
            'status_atual' => ItemStatus::EmAnalise
        ]);
    }

    public function updated(FichaDoacao $ficha_doacao): void
    {
        if (!$ficha_doacao->wasChanged('status_atual')) {
            return;
        }

        $detail_type = StatusDetailType::from($ficha_doacao->status_atual->value);

        StatusItemLog::query()->create([
            'funcionario_id' => Auth::id(),
            'ficha_doacao_id' => $ficha_doacao->ficha_doacao_id,
            'from_status' => $ficha_doacao->getOriginal('status_atual'),
            'to_status' => $ficha_doacao->status_atual,
            'status_detail_type' => $detail_type,
            'status_detail_id' => null
        ]);
    }
}
