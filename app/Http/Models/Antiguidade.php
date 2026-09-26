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
        'ficha_acervo_id',
        'valor',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
    ];

    public function fichaAcervo(): BelongsTo
    {
        return $this->belongsTo(FichaRegistroAcervo::class, 'ficha_acervo_id', 'id_ficha_acervo');
    }
}
