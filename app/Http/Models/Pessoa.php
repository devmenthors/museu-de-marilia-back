<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';
    protected $primaryKey = 'cpf';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'cpf',
        'nome_pessoa',
        'email',
        'endereco_id',
    ];

    public function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class, 'endereco_id', 'endereco_id');
    }

    public function funcionario(): HasOne
    {
        return $this->hasOne(Funcionario::class, 'pessoa_cpf', 'cpf');
    }

    public function doador(): HasOne
    {
        return $this->hasOne(Doador::class, 'cpf', 'cpf');
    }

    public function doacoes(): HasMany
    {
        return $this->hasMany(Doacao::class, 'pessoa_cpf', 'cpf');
    }
}
