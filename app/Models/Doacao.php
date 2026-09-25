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
    protected $primaryKey = 'protocolo_doacao';
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

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'status_id');
    }

    public function cadImagens(): HasMany
    {
        return $this->hasMany(CadImagem::class, 'protocolo_doacao', 'protocolo_doacao');
    }

    public function fluxos(): HasMany
    {
        return $this->hasMany(Fluxo::class, 'protocolo_doacao', 'protocolo_doacao');
    }
}
