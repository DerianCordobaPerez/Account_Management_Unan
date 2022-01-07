<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 *
 */
class Payment extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * @var string[]
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string[]
     */
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

    /**
     * @var string[]
     */
    protected $casts = [
        'date_made_payment' => 'datetime',
        'payment_registration_date' => 'datetime'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the index name for the model
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'payments_index';
    }

    /**
     * Get the indexable data array for the model
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        // Customize array with extra attributes
        $array = $this->toArray();

        // Add the user's names and lastnames to the array.
        $array['user_name'] = $this->user->names;
        $array['user_lastnames'] = $this->user->lastnames;

        return $array;
    }
}
