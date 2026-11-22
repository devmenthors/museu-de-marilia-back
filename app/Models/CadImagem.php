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
        'ficha_doacao_id',
        // adicione aqui os "2 more..." campos assim que você me disser quais são
    ];

    public function doacao(): BelongsTo
    {
        return $this->belongsTo(FichaDoacao::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }
}
