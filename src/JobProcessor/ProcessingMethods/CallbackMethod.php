<?php

namespace App\JobProcessor\ProcessingMethods;

use App\JobProcessor\TextProcessingMethodInterface;

class CallbackMethod implements TextProcessingMethodInterface
{

    /**
     * @var callable
     */
    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param String $text
     * @return String
     */
    public function processText(String $text): String
    {
        return call_user_func($this->callback, $text);
    }
}
