<?php

namespace App\JobProcessor\ProcessingMethods;

class ToNumberMethod extends CallbackMethod
{
    /**
     * ToNumberMethod constructor.
     */
    public function __construct()
    {
        $callback = function (String $text) {
            if (!preg_match('/\d+/', $text, $matches)) {
                return null;
            }
            return $matches[0];
        };
        parent::__construct($callback);
    }
}
