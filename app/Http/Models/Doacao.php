<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Doacao extends Model
{
    use HasFactory;

    protected $table = 'doacoes';
    protected $primaryKey = 'id_doacao';
    public $timestamps = true;

    protected $fillable = [
        'codigo_protocolo',
        'historico',
        'justificativa',
        'tip_acervo',
        'status',
        'dt_recebimento',
        'confirmado_em',
        'status_id',
        'pessoa_cpf',
        'doador_cpf',
    ];

    protected $casts = [
        'dt_recebimento' => 'datetime',
        'confirmado_em' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($doacao) {
            $prefixos = [
                'paleontologia' => 'DOA-PALEON',
                'historica'     => 'DOA-HIST',
                'arqueologia'   => 'DOA-ARQ',
                'numismatica'   => 'DOA-NUMIS',
            ];

            $slug = Str::slug($doacao->tip_acervo);
            $prefixo = $prefixos[$slug] ?? 'DOA-' . strtoupper(substr($slug, 0, 5));
            $data = now()->format('Ymd');
            
            $sequencial = self::where('tip_acervo', $doacao->tip_acervo)
                                ->whereDate('created_at', now())
                                ->count() + 1;

            $doacao->codigo_protocolo = "{$prefixo}-{$data}-" . str_pad($sequencial, 2, '0', STR_PAD_LEFT);
        });
    }

    public function pessoa(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_cpf', 'cpf');
    }

    public function doador(): BelongsTo
    {
        return $this->belongsTo(Doador::class, 'doador_cpf', 'cpf');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'status_id');
    }

    public function cadImagens(): HasMany
    {
        return $this->hasMany(CadImagem::class, 'doacao_id', 'id_doacao');
    }

    public function fluxos(): HasMany
    {
        return $this->hasMany(Fluxo::class, 'doacao_id', 'id_doacao');
    }
}
