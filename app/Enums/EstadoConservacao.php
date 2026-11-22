<?php

namespace App\Enums;

enum EstadoConservacao: string
{
    case MuitoBom = 'muito bom';
    case Bom = 'bom';
    case Mediano = 'mediano';
    case Ruim = 'ruim';
    case MuitoRuim = 'muito ruim';

    public function label(): string 
    {
        return match($this) {
            self::MuitoBom => "Muito bom",
            self::Bom => "Bom",
            self::Mediano => "Mediano",
            self::Ruim => "Ruim",
            self::MuitoRuim => "Muito Ruim"
        };
    }
}