<?php

namespace App\Helpers;

trait RoleHelper
{
    public function isAdmin(): bool
    {
        return $this->hasRoles('admin');
    }

    public function authorize(mixed $roles): bool
    {
        return $this->hasRoles($roles);
    }

    private function hasRoles(mixed $roles): bool
    {
        // If $roles is a string, convert it to an array
        $roles = is_array($roles) ? $roles : func_get_args();

        // Check if the user has any of the roles
        return $this->roles()->whereIn('name', $roles)->exists();
    }
}
