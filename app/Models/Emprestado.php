<?php

namespace App\Models;

use App\Observers\EmprestadosObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([EmprestadosObserver::class])]
class Emprestado extends Model
{
    protected $table = 'emprestados';
    protected $primaryKey = 'emprestado_id';
    public $timestamps = false;

    protected $fillable = [
        'dt_encaminhado',
        'instituicao',
        'justificativa_encaminhado',
        'ficha_doacao_id'
    ];

    public function ficha(): BelongsTo {
        return $this->belongsTo(FichaDoacao::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }
}
