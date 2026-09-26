<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';
    protected $primaryKey = 'status_id';
    public $timestamps = false;

    protected $fillable = [
        'nm_status',
    ];

    public function doacoes(): HasMany
    {
        return $this->hasMany(Doacao::class, 'status_id', 'status_id');
    }
}
