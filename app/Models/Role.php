<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;
    protected $dates = ['deleted_at'];
    protected $softCascade = ['users', 'privileges'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function privileges(): BelongsToMany
    {
        return $this->belongsToMany(Privilege::class, 'role_privileges');
    }
}
