<?php

namespace App\Models;

use App\Helpers\RoleHelper;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, SoftCascadeTrait, RoleHelper;

    protected $dates = ['deleted_at'];

    protected $softCascade = ['students', 'payments'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'names',
        'lastnames',
        'email',
        'sex',
        'identification',
        'maritalStatus',
        'phone',
        'nationality',
        'municipality',
        'address',
        'neighborhood',
        'birthday',
        'img',
        'active',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'datetime'
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
