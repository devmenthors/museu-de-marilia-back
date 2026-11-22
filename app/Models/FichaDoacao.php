<?php

namespace App\Models;

use Illuminate\Support\Str;

use App\Enums\Categoria;
use App\Enums\EstadoConservacao;
use App\Enums\ItemStatus;
use App\Observers\FichaDoacaoObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([FichaDoacaoObserver::class])]
class FichaDoacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fichas_doacao';
    protected $primaryKey = 'ficha_doacao_id';
    public $timestamps = false;

    protected $fillable = [
        'nome_acervo',
        'categoria_acervo', /* ENUM CATEGORIA NO APP\ENUM */
        'dt_incorporacao', 
        'estado_conservacao', /* ENUM ESTADOCONSERVACAO NO APP\ENUM */
        'qnt_itens',
        'cor',
        'altura',
        'largura',
        'descricao',
        'status_atual', /* ENUM STATUS CRIADO NO APP\ENUM */
        'funcionario_id',
        'doador_id',
        'dt_recebimento',
        'confirmado_em',
    ];

    protected static function booted(): void
    {
        static::creating(function (FichaDoacao $ficha) {
            if (empty($ficha->protocolo)) {
                $prefixoNome = strtoupper(Str::ascii(Str::substr(str_replace(" ", "", $ficha->nome_acervo), 0, 5)));
                // ex: nome_acervo = Doação DOAÇA-21112026-AX3
                $ficha->codigo_protocolo = $prefixoNome  . "-" . date('dmY') . "-" . strtoupper(Str::random(3));
            }
        });
    }

    public function logs(): HasMany /* para puxar todos os logs relacionados a ficha */
    {
        return $this->hasMany(StatusItemLog::class, 'ficha_doacao_id', 'ficha_doacao_id')->withTrashed();
    }

    public function doador(): BelongsTo
    {
        return $this->belongsTo(Doador::class, 'doador_id', 'doador_id')->withTrashed();
    }

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id', 'funcionario_id')->withTrashed();
    }

    // ENUMs

    protected function casts(): array
    {
        return [
            'categoria_acervo' => Categoria::class,
            'estado_concervacao' => EstadoConservacao::class,
            'status_atual' => ItemStatus::class
        ];
    }

    /*
        DETALHE SOBRE ENUMS: quando for utilizar, deve-se fazer a validação por meio do validate
        se o case existe no Enum criado (isso no Controller)

        EX:
            $validated = $request->validate([
                'status' => ['required', Rule::enum(PostStatus::class)],
            ]);
    */


    // CADA TABELA LÁ

    public function descartado(): HasMany 
    {
        return $this->hasMany(Descartado::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }

    public function emAnalise(): HasMany 
    {
        return $this->hasMany(EmAnalise::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }

    public function emprestado(): HasMany 
    {
        return $this->hasMany(Emprestado::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }

    public function exposicao(): HasMany 
    {
        return $this->hasMany(Exposicao::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }
    
    public function reservaTecnica(): HasMany 
    {
        return $this->hasMany(ReservaTecnica::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }
}
