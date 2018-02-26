<?php

namespace App\JobProcessor\ProcessingMethods;

class RemoveSpacesMethod extends CallbackMethod
{
    /**
     * RemoveSpacesMethod constructor
     */
    public function __construct()
    {
        $callback = function (String $text) {
            return preg_replace('/\s+/si', '', $text);
        };
        parent::__construct($callback);
    }
}
