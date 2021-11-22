<?php

namespace App\helpers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Closure;

/**
 *
 */
class RedirectHelper
{
    /**
     * @var RedirectHelper|null
     */
    private static ?RedirectHelper $instance = null;

    /**
     * RedirectHelper constructor
     */
    private function __construct() {}

    /**
     * Get instance using singleton pattern
     *
     * @return RedirectHelper
     */
    public static function getInstance(): RedirectHelper
    {
        // if instance is null, create new instance
        if(is_null(static::$instance))
            static::$instance = new RedirectHelper();

        // return instance
        return static::$instance;
    }

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
        if(!auth()->user()->authorize($roles) || !auth()->user()->isAdmin())
            return redirect()->route('home')->with('error', 'No estas autorizado para acceder a esta ruta');

        // If the user contains the required roles, execute the closure
        return $closure();
    }

}
