<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $softCascade = ['users'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
