<?php

namespace App\Helpers;

/**
 *
 */
trait SingletonHelper
{
    /**
     * @var self
     */
    private static mixed $instance = null;

    /**
     * Get instance using singleton pattern
     *
     * @return mixed
     */
    public static function getInstance(): mixed
    {
        // if instance is null, create new instance
        if (is_null(static::$instance))
            static::$instance = new static();

        // return instance
        return static::$instance;
    }
}
