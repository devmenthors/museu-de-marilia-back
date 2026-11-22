<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'enderecos';
    protected $primaryKey = 'endereco_id';
    public $timestamps = false;

    protected $fillable = [
        'cep',
        'estado',
        'cidade',
        'bairro',
        'logradouro',
        'numero',
        'complemento',
        'endereco_id'
    ];

    public function doadores(): BelongsToMany
    {
        return $this->belongsToMany(Doador::class, 'endereco_id', 'endereco_id');
    }
}
