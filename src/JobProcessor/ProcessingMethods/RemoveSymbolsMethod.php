<?php

namespace App\JobProcessor\ProcessingMethods;

class RemoveSymbolsMethod extends CallbackMethod
{

    /**
     * RemoveSymbolsMethod constructor.
     * @param string|array $symbols
     */
    public function __construct($symbols)
    {
        $symbols = str_split($symbols);
        $callback = function (String $text) use ($symbols) {
            return str_replace($symbols, '', $text);
        };
        parent::__construct($callback);
    }
}
