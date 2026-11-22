<?php

namespace App\Enums;

use App\Models\Descartado;
use App\Models\EmAnalise;
use App\Models\Emprestado;
use App\Models\Exposicao;
use App\Models\ReservaTecnica;

enum StatusDetailType: string
{
    case EmAnalise = EmAnalise::class;
    case Emprestado = Emprestado::class;
    case ReservaTecnica = ReservaTecnica::class;
    case Exposto = Exposicao::class;
    case Descartado = Descartado::class;

    public static function fromItemStatus(ItemStatus $status): self
    {
        return match($status) {
            ItemStatus::EmAnalise => self::EmAnalise,
            ItemStatus::Emprestado => self::Emprestado,
            ItemStatus::ReservaTecnica => self::ReservaTecnica,
            ItemStatus::Exposto => self::Exposto,
            ItemStatus::Descartado => self::Descartado,
        };
    }
}