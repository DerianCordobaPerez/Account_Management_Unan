<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Payment extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'concept',
        'amount',
        'date_made_payment',
        'payment_registration_date',
        'amount_in_letters',
        'observation',
        'payment_received',
        'account_is_payment',
        'identification',
        'exchange_rate',
        'currency',
        'receipt_number',
        'pay_time',
        'status',
        'cashier',
        'cashier_identification'
    ];

    protected $casts = [
        'date_made_payment' => 'datetime',
        'payment_registration_date' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function searchableAs(): string
    {
        return 'payments_index';
    }
}
