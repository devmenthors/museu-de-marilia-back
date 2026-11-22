<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doador extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'doadores';
    protected $primaryKey = 'doador_id';
    public $timestamps = false;

    protected $fillable = [
        'telefone',
        'funcionario_id',
        'pessoa_id'
    ];

    public function doacoes(): HasMany
    {
        return $this->hasMany(FichaDoacao::class, 'doador_id', 'doador_id');
    }

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'pessoa_id');
    }

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id', 'funcionario_id')->withTrashed();
    }

    public function enderecos(): hasMany
    {
        return $this->hasMany(Endereco::class, 'doador_id', 'doador_id');
    }
}
