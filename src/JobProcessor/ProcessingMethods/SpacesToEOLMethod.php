<?php

namespace App\JobProcessor\ProcessingMethods;

class SpacesToEOLMethod extends CallbackMethod
{
    /**
     * SpacesToEOLMethod constructor
     */
    public function __construct()
    {
        $callback = function (String $text) {
            return preg_replace('/\s+/si', PHP_EOL, $text);
        };
        parent::__construct($callback);
    }
}
