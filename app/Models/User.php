<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
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
    ];

    public function roles(): BelongsToMany {
        return $this->belongsToMany(Role::class);
    }

    public function authorize(array|string|null $roles): bool {
        return $this->hasRoles($roles);
    }

    public function isAdmin(): bool {
        return $this->hasRoles('admin');
    }

    private function hasRoles(array|string|null $roles): bool {
        if(!is_null($roles)) {
            if(is_array($roles)) {
                foreach ($roles as $role) {
                    if($this->roles()->where('name', $role)->exists())
                        return true;
                }
                return false;
            }
            return $this->roles()->where('name', $roles)->exists();
        }
        return false;
    }

}
