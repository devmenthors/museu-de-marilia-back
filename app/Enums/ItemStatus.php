<?php

namespace App\Enums;

enum ItemStatus: string
{
    case EmAnalise = 'em_analise';
    case Emprestado = 'emprestado';
    case ReservaTecnica = 'reserva_tecnica';
    case Exposto = 'exposto';
    case Descartado = "descartado";
    
    public function label(): string {
        return match($this) {
            self::EmAnalise => 'Em Analise',
            self::Emprestado => 'Emprestado',
            self::ReservaTecnica => 'Reserva Tecnica',
            self::Exposto => 'Exposto',
            self::Descartado => 'Descartado',
        };
    }
}