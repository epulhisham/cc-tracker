<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'statement_month_id',
        'type',
        'amount',
        'amount_date',
        'notes',
    ];

    protected $casts = [
        'amount_date' => 'datetime',
    ];

    public function statementMonth(): BelongsTo
    {
        return $this->belongsTo(StatementMonth::class);
    }
}
