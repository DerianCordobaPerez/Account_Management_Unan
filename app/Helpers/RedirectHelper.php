<?php

namespace App\Helpers;
use Closure;

/**
 *
 */
class RedirectHelper
{
    use SingletonHelper;

    /**
     * RedirectHelper constructor
     */
    private function __construct() { }

    /**
     * Redirect to given url if not contains any roles
     *
     * @param array|string $roles
     * @param Closure $closure
     * @return mixed
     */
    public function redirect(array|string $roles, Closure $closure): mixed
    {
        // If the user not contains the required roles, redirect to the home page
        if (!auth()->user()->authorize($roles) && !auth()->user()->isAdmin())
            return redirect()->route('home')->with('error', 'No estas autorizado para acceder a esta ruta');

        // If the user contains the required roles, execute the closure
        return $closure();
    }

}
