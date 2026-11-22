<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Funcionario extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = 'funcionarios';
    protected $primaryKey = 'funcionario_id'; //
    public $timestamps = false;

    protected $fillable = [
        'senha',
        'pessoa_id'
    ];

    protected $hidden = [
        'senha',
    ];

    public function getAuthPasswordName(): string
    {
        return 'senha';
    }

    public function fichasDoacao(): HasMany
    {
        return $this->hasMany(FichaDoacao::class, 'funcionario_id', 'funcionario_id')->withTrashed();
    }

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'pessoa_id');
    }

    public function casts(): array
    {
        return [
            'senha' => 'hashed',
        ];
    }
}
