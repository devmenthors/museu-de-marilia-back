<?php

namespace App\Observers;

use App\Enums\StatusDetailType;
use App\Models\StatusItemLog;

class StatusItemObserver
{
    public function created(StatusItemLog $status_item_log) : void 
    {
        // deleta das outras tabelas EXETO a atual
        // NOTA: Perguntar pra Mafer se deixa os registros ou não
        // se não dai a gente só tira isso daqui
        $status_item_log->fichaDoacao();

        foreach(StatusDetailType::cases() as $case) {
            $modelClass = $case->value;
            
            if ($status_item_log->status_detail_type !== null && $status_item_log->status_detail_type !== $case) {
                $modelClass::where('ficha_doacao_id', $status_item_log->ficha_doacao_id)->delete();
            }
        }

    }
}
