<?php

namespace App\Models;

use App\Observers\DescartadosObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([DescartadosObserver::class])]
class Descartado extends Model
{
    protected $table = 'descartados';
    protected $primaryKey = 'descartado_id';
    public $timestamps = false;

    protected $fillable = [
        'justificativa_descartado'
    ];

    public function ficha(): BelongsTo {
        return $this->belongsTo(FichaDoacao::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }
}
