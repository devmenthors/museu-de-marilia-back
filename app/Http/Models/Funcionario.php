<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';
    protected $primaryKey = 'pessoa_cpf';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'pessoa_cpf',
        'senha',
        'timestamp',
    ];

    protected $hidden = [
        'senha',
    ];

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_cpf', 'cpf');
    }
}
