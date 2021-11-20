<?php

namespace App\helpers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 *
 */
class RedirectHelper
{
    private ViewHelper $viewHelper;
    private static ?RedirectHelper $instance = null;

    /**
     * RedirectHelper constructor
     */
    private function __construct()
    {
        // Set the view helper using singleton pattern
        $this->viewHelper = ViewHelper::getInstance();
    }

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
     * Render view with data or redirect to home route
     * if not contains any of the roles
     *
     * @param string $name Name of the view
     * @param array $roles Roles to check
     * @param mixed $data Data to pass to the view
     * @return RedirectResponse|View
     */
    public function render(string $name, array $roles, mixed $data): RedirectResponse | View {
        // If the user not contains the required roles, redirect to the home page
        if(!auth()->user()->authorize($roles) || !auth()->user()->isAdmin())
            return redirect()->route('home')->with('error', 'No estas autorizado para acceder a esta ruta');

        // If the user contains the required roles, render to the given page
        return $this->viewHelper->get($name, $data);
    }

}
