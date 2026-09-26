<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmAnalise extends Model
{
    use HasFactory;

    protected $table = 'em_analises';
    protected $primaryKey = 'id_analise';
    public $timestamps = false;

    protected $fillable = [
        'parecer_tec',
        'apto_incorporacao',
        'apto_exposicao',
        'obs_laudo',
        'aprovado',
        'id_fluxo',
    ];

    protected $casts = [
        'apto_incorporacao' => 'boolean',
        'apto_exposicao' => 'boolean',
        'aprovado' => 'boolean',
    ];

    public function fluxo(): BelongsTo
    {
        return $this->belongsTo(Fluxo::class, 'id_fluxo', 'id_fluxo');
    }

    public function fichasRegistroAcervo(): HasMany
    {
        return $this->hasMany(FichaRegistroAcervo::class, 'id_analise', 'id_analise');
    }
}
