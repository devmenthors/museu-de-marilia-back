<?php

namespace App\Enums;

enum Categoria: string
{
    case Pintura = 'pintura';
    case Escultura = 'escultura';
    case Gravura = 'gravura';
    case Fotografia = 'fotografia';
    case Artefato = 'artefato';
    case Arqueologico = 'arqueologico';
    case Minerais = 'minerais';
    case Astrologia = 'astrologia';

    public function label(): string {
        return match($this) {
            self::Pintura => "Pintura",
            self::Escultura => "Escultura",
            self::Gravura => "Gravura",
            self::Fotografia => "Fotografia",
            self::Artefato => "Artefato",
            self::Arqueologico => "Arqueológico",
            self::Minerais => "Minerais",
            self::Astrologia => "Astrologia"
        };
    }
}