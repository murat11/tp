<?php

namespace App\JobProcessor;

class TextProcessingJob
{
    /**
     * @var String
     */
    private $text;

    /**
     * @var String[]
     */
    private $methods;


    /**
     * TextProcessingJob constructor.
     * @param String $text
     * @param String[] $methods
     */
    public function __construct(String $text, array $methods)
    {
        $this->text = $text;
        $this->methods = $methods;
    }

    /**
     * @return String
     */
    public function getText(): String
    {
        return $this->text;
    }

    /**
     * @return String[]
     */
    public function getMethods(): array
    {
        return $this->methods;
    }
}
