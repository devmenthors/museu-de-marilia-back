<?php

namespace App\Models;

use App\Observers\ReservaTecnicaObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([ReservaTecnicaObserver::class])]
class ReservaTecnica extends Model
{
    use HasFactory;

    protected $table = 'reserva_tecnica';
    protected $primaryKey = 'reserva_id';
    public $timestamps = false;

    protected $fillable = [
        'justificativa_reserva',
        'prateleira',
        'ficha_doacao_id'
    ];

    public function ficha(): BelongsTo 
    {
        return $this->belongsTo(FichaDoacao::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }
}
