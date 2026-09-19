<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doador extends Model
{
    use HasFactory;

    protected $table = 'doadores';
    protected $primaryKey = 'cpf';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'cpf',
        'telefone',
    ];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'cpf', 'cpf');
    }

    public function doacoes(): HasMany
    {
        return $this->hasMany(Doacao::class, 'doador_cpf', 'cpf');
    }
}
