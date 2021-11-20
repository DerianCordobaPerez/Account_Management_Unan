<?php

namespace App\helpers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\View as ViewMake;

/**
 *
 */
class ViewHelper
{

    /**
     * @var RedirectHelper
     */
    private RedirectHelper $redirectHelper;

    /**
     *
     */
    private function __construct() {
        // Set the redirect helper using singleton pattern
        $this->redirectHelper = RedirectHelper::getInstance();
    }

    /**
     * @var ViewHelper|null
     */
    private static ?ViewHelper $instance = null;

    /**
     * @return ViewHelper
     */
    public static function getInstance(): ViewHelper
    {
        if(is_null(static::$instance))
            static::$instance = new ViewHelper();

        return static::$instance;
    }

    /**
     * Obtains the view with the name passed by parameter and assigns
     * within the same keys with an associated value
     *
     * @param string $name View name
     * @param mixed $data Data to pass to the view
     * @return View
     */
    public function get(string $name, mixed $data):  View
    {
        // Get view
        $view = ViewMake::make($name);

        // We validate that the data sent is not null
        if(isset($data)) {
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
     * @param array|string $roles Roles to check
     * @param mixed $data Data to pass to the view
     * @return RedirectResponse|View
     */
    public function render(string $name, array|string $roles, mixed $data): RedirectResponse | View {
        // We check if the user contains any of the roles
        return $this->redirectHelper->redirect($roles, function() use ($name, $data) {
            // If the user contains the required roles,
            // render to the given page
            return $this->get($name, $data);
        });
    }

}
