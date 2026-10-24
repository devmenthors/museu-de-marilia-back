<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doacao extends Model
{
    use HasFactory;

    protected $table = 'doacoes';
    protected $primaryKey = 'id_doacao';
    public $timestamps = false;

    protected $fillable = [
        'historico',
        'justificativa',
        'tip_acervo',
        'status',
        'dt_recebimento',
        'confirmado_em',
        'status_id',
        'pessoa_cpf',
        'doador_cpf',
    ];

    protected $casts = [
        'dt_recebimento' => 'datetime',
        'confirmado_em' => 'datetime',
    ];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_cpf', 'cpf');
    }

    public function doador(): BelongsTo
    {
        return $this->belongsTo(Doador::class, 'doador_cpf', 'cpf');
    }

    public function cadImagens(): HasMany
    {
        return $this->hasMany(CadImagem::class, 'codigo_protocolo', 'codigo_protocolo');
    }

    public function fluxos(): HasMany
    {
        return $this->hasMany(Fluxo::class, 'codigo_protocolo', 'codigo_protocolo');
    }
}
