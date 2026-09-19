<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FichaRegistroAcervo extends Model
{
    use HasFactory;

    protected $table = 'fichas_de_registro_acervo';
    protected $primaryKey = 'protocolo_registro_acervo';
    public $timestamps = false;

    protected $fillable = [
        'dt_incorporacao',
        'antigo_proprietario',
        'estado_conservacao',
        'qnt_itens',
        'cor',
        'largura',
        'altura',
        'descricao',
        'colecao_id',
        'protocolo_analise',
    ];

    protected $casts = [
        'dt_incorporacao' => 'datetime',
        'largura' => 'decimal:2',
        'altura' => 'decimal:2',
    ];

    public function colecao(): BelongsTo
    {
        return $this->belongsTo(Colecao::class, 'colecao_id', 'colecao_id');
    }

    public function emAnalise(): BelongsTo
    {
        return $this->belongsTo(EmAnalise::class, 'protocolo_analise', 'protocolo_analise');
    }

    public function antiguidades(): HasMany
    {
        return $this->hasMany(Antiguidade::class, 'protocolo_antiguidade', 'protocolo_registro_acervo');
    }
}
