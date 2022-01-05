<?php

namespace App\Helpers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 *
 */
class ViewHelper
{
    use SingletonHelper;

    /**
     * @var RedirectHelper
     */
    private RedirectHelper $redirectHelper;

    /**
     *
     */
    private function __construct()
    {
        // Set the redirect helper using singleton pattern
        $this->redirectHelper = RedirectHelper::getInstance();
    }

    /**
     * Obtains the view with the name passed by parameter and assigns
     * within the same keys with an associated value
     *
     * @param string $name View name
     * @param mixed $data Data to pass to the view
     * @return View
     */
    protected function get(string $name, mixed $data): View
    {
        return view($name, $data);
    }

    /**
     * Render view with data or redirect to home route
     * if not contains any of the roles
     *
     * @param string $name Name of the view
     * @param mixed $data Data to pass to the view
     * @param array|string $roles Roles to check
     * @return RedirectResponse|View
     */
    public function render(string $name, mixed $data = null, array|string $roles = []): RedirectResponse|View
    {
        // We check if the user contains any of the roles
        return $this->redirectHelper->redirect($roles, function() use($name, $data) {
            // If the user contains the required roles,
            // render to the given page
            return $this->get($name, $data);
        });
    }

}
