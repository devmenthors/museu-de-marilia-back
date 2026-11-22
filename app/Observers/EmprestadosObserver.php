<?php

namespace App\Observers;

use App\Enums\ItemStatus;
use App\Enums\StatusDetailType;
use App\Models\Emprestado;
use App\Models\StatusItemLog;

class EmprestadosObserver
{
    public function created(Emprestado $emprestado): void
    {
        $detail_type = StatusDetailType::Emprestado;
        $ficha = $emprestado->ficha;

        StatusItemLog::query()->create([
            'ficha_doacao_id' => $emprestado->ficha_doacao_id,
            'from_status' => $ficha->status_atual,
            'to_status' => ItemStatus::Emprestado,
            'status_detail_type' => $detail_type,
            'status_detail_id' => $emprestado->emprestado_id,
            'funcionario_id' => 1, //Auth::id(); MUDAR ISSO DEPOIS QUE O AUTH FOR ADICIONADO
        ]);

        $ficha?->updateQuietly([
            'status_atual' => ItemStatus::Emprestado,
        ]);
    }
}
