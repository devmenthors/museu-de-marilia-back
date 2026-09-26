<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encaminhado extends Model
{
    use HasFactory;

    protected $table = 'encaminhados';
    protected $primaryKey = 'id_fluxo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id_fluxo',
        'dt_encaminhado',
        'instituicao',
        'justificativa_encaminhado',
    ];

    protected $casts = [
        'dt_encaminhado' => 'datetime',
    ];

    public function fluxo(): BelongsTo
    {
        return $this->belongsTo(Fluxo::class, 'id_fluxo', 'id_fluxo');
    }
}
