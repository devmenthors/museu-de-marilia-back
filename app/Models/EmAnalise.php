<?php

namespace App\Models;

use App\Observers\EmAnalisesObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([EmAnalisesObserver::class])]
class EmAnalise extends Model
{
    protected $table = 'em_analises';
    protected $primaryKey = 'em_analise_id';
    public $timestamps = false;

    protected $fillable = [
        'parecer_tec',
        'apto_incorporado',
        'apto_exposicao',
        'obs_laudo',
        'aprovado',
        'ficha_doacao_id'
    ];

    public function ficha(): BelongsTo 
    {
        return $this->belongsTo(FichaDoacao::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }
}
