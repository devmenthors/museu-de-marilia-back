<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Antiguidade extends Model
{
    use HasFactory;

    protected $table = 'antiguidades';
    protected $primaryKey = 'antiguidade_id';
    public $timestamps = false;

    protected $fillable = [
        'protocolo_antiguidade',
        'valor',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
    ];

    public function fichaRegistroAcervo(): BelongsTo
    {
        return $this->belongsTo(FichaRegistroAcervo::class, 'protocolo_antiguidade', 'protocolo_registro_acervo');
    }
}
