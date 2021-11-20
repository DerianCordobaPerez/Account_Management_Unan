<?php

namespace App\helpers;

use Illuminate\View\View;
use Illuminate\Support\Facades\View as ViewMake;

class ViewHelper
{
    /**
     *
     */
    private function __construct() {}

    /**
     *
     */
    private function __clone(): void {}

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
    public function get(string $name, mixed $data):  View {
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

}
