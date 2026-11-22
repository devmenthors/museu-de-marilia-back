<?php

namespace App\Models;

use App\Observers\ExposicoesObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([ExposicoesObserver::class])]
class Exposicao extends Model
{
    protected $table = 'exposicoes';
    protected $primaryKey = 'exposicao_id';
    public $timestamps = false;

    protected $fillable = [
        'sala',
        'gongola',
        'ficha_doacao_id'
    ];

    public function ficha(): BelongsTo 
    {
        return $this->belongsTo(FichaDoacao::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }
}
