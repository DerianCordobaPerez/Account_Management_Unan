<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

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
        'cashier',
        'cashier_identification'
    ];

    protected $casts = [
        'date_made_payment' => 'datetime',
        'payment_registration_date' => 'datetime',
        'payment_received' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
