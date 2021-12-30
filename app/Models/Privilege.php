<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Privilege extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;
    protected $dates = ['deleted_at'];
    protected $softCascade = ['roles'];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
