<?php

namespace App\Helpers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View as ViewMake;
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
    private function get(string $name, mixed $data): View
    {
        // Get view
        $view = ViewMake::make($name);

        // We validate that the data sent is not null
        if (isset($data)) {
            // We go through the data array using key value
            foreach ($data as $key => $value)
                //Inside the view we create a new attribute with the key and
                // give it the corresponding value
                $view->$key = $value;
        }

        // Returns view
        return $view;
    }

    /**
     * Render view with data or redirect to home route
     * if not contains any of the roles
     *
     * @param string $name Name of the view
     * @param mixed $data Data to pass to the view
     * @param array|string|null $roles Roles to check
     * @return RedirectResponse|View
     */
    public function render(string $name, mixed $data = null, array|string $roles = null): RedirectResponse|View
    {
        // We validate that the roles sent is not null
        if (is_null($roles) || count($roles) == 0)
            return $this->get($name, $data);

        // We check if the user contains any of the roles
        return $this->redirectHelper->redirect($roles, function () use ($name, $data) {
            // If the user contains the required roles,
            // render to the given page
            return $this->get($name, $data);
        });
    }

}
