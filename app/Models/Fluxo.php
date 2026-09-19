<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fluxo extends Model
{
    use HasFactory;

    protected $table = 'fluxos';
    protected $primaryKey = 'id_fluxo';

    // A tabela usa data_criado/data_atualizado em vez de created_at/updated_at
    const CREATED_AT = 'data_criado';
    const UPDATED_AT = 'data_atualizado';

    protected $fillable = [
        'descricao',
        'protocolo_doacao',
    ];

    public function doacao(): BelongsTo
    {
        return $this->belongsTo(Doacao::class, 'protocolo_doacao', 'protocolo_doacao');
    }

    public function naoIncorporado(): HasOne
    {
        return $this->hasOne(NaoIncorporado::class, 'id_fluxo', 'id_fluxo');
    }

    public function encaminhado(): HasOne
    {
        return $this->hasOne(Encaminhado::class, 'id_fluxo', 'id_fluxo');
    }

    public function emAnalises(): HasMany
    {
        return $this->hasMany(EmAnalise::class, 'id_fluxo', 'id_fluxo');
    }
}
