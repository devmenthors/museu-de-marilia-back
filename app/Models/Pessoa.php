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
    protected $primaryKey = 'pessoa_id';
    public $timestamps = false;

    protected $fillable = [
        'pessoa_id',
        'cpf',
        'nome_pessoa',
        'email',
    ];

    public function funcionario(): HasOne
    {
        return $this->hasOne(Funcionario::class, 'pessoa_id', 'pessoa_id');
    }

    public function doador(): HasOne
    {
        return $this->hasOne(Doador::class, 'pessoa_id', 'pessoa_id');
    }
}
