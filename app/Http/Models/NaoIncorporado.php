<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NaoIncorporado extends Model
{
    use HasFactory;

    protected $table = 'nao_incorporados';
    protected $primaryKey = 'id_fluxo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_fluxo',
        'justificativa_naoincorporado',
    ];

    public function fluxo(): BelongsTo
    {
        return $this->belongsTo(Fluxo::class, 'id_fluxo', 'id_fluxo');
    }
}
