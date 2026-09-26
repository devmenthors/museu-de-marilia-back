<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class FichaRegistroAcervo extends Model
{
    use HasFactory;

    protected $table = 'fichas_de_registro_acervo';
    protected $primaryKey = 'id_ficha_acervo';
    public $timestamps = true;

    protected $fillable = [
        'categoria_acervo',
        'codigo_protocolo',
        'dt_incorporacao',
        'antigo_proprietario',
        'estado_conservacao',
        'qnt_itens',
        'cor',
        'largura',
        'altura',
        'descricao',
        'colecao_id',
        'id_analise',
    ];

    protected $casts = [
        'dt_incorporacao' => 'datetime',
        'largura' => 'decimal:2',
        'altura' => 'decimal:2',
    ];

    protected static function booted()
    {
        static::creating(function ($ficha) {
            $prefixos = [
                'paleontologia' => 'PALEON',
                'historica'     => 'HIST',
                'arqueologia'   => 'ARQ',
                'numismatica'   => 'NUMIS',
            ];

            $slug = Str::slug($ficha->categoria_acervo);
            $prefixo = $prefixos[$slug] ?? strtoupper(substr($slug, 0, 5));
            $data = now()->format('Ymd');

            $sequencial = self::where('categoria_acervo', $ficha->categoria_acervo)
                                ->whereDate('created_at', now())
                                ->count() + 1;

            $ficha->codigo_protocolo = "{$prefixo}-{$data}-" . str_pad($sequencial, 2, '0', STR_PAD_LEFT);
        });
    }

    public function colecao(): BelongsTo
    {
        return $this->belongsTo(Colecao::class, 'colecao_id', 'colecao_id');
    }

    public function emAnalise(): BelongsTo
    {
        return $this->belongsTo(EmAnalise::class, 'id_analise', 'id_analise');
    }

    public function antiguidades(): HasMany
    {
        return $this->hasMany(Antiguidade::class, 'ficha_acervo_id', 'id_ficha_acervo');
    }
}
