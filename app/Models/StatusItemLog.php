<?php

namespace App\Models;

use App\Enums\ItemStatus;
use App\Enums\StatusDetailType;
use App\Observers\StatusItemObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

#[ObservedBy([StatusItemObserver::class])]
class StatusItemLog extends Model
{
    protected $table = 'status_item_log';
    protected $primaryKey = 'log_id';
    public $timestamps = false;
    
    protected $fillable = [
        'ficha_doacao_id',
        'funcionario_id',
        'from_status',
        'to_status',
        'status_detail_type',
        'status_detail_id',
    ];

    public function casts() : array
    {
        return [
            'from_status' => ItemStatus::class,
            'to_status' => ItemStatus::class,
            'status_detail_type' => StatusDetailType::class,
        ];
    }

    public function details(): MorphTo
    {
        return $this->morphTo();
    }

    public function fichaDoacao(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'ficha_doacao_id', 'ficha_doacao_id');
    }

    public function funcionario(): BelongsTo
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id', 'funcionario_id');
    }
}
