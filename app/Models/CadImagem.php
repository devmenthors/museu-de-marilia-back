<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CadImagem extends Model
{
    use HasFactory;

    protected $table = 'cad_imagens';
    protected $primaryKey = 'imagem_id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'imagem_id',
        'img_key',
        'protocolo_doacao',
        // adicione aqui os "2 more..." campos assim que você me disser quais são
    ];

    public function doacao(): BelongsTo
    {
        return $this->belongsTo(Doacao::class, 'protocolo_doacao', 'protocolo_doacao');
    }
}
