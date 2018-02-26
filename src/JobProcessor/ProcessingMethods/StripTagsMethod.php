<?php

namespace App\JobProcessor\ProcessingMethods;

class StripTagsMethod extends CallbackMethod
{
    /**
     * StripTagsMethod constructor
     */

    public function __construct()
    {
        $callback = function (String $text) {
            return strip_tags($text);
        };
        parent::__construct($callback);
    }
}
