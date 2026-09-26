<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colecao extends Model
{
    use HasFactory;

    protected $table = 'colecoes';
    protected $primaryKey = 'colecao_id';
    public $timestamps = false;

    protected $fillable = [
        'nome_colecao',
    ];

    public function fichasRegistroAcervo(): HasMany
    {
        return $this->hasMany(FichaRegistroAcervo::class, 'colecao_id', 'colecao_id');
    }
}
