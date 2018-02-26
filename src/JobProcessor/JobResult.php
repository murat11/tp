<?php

namespace App\JobProcessor;


class JobResult
{

    /**
     * @var String
     */
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @inheritdoc
     */
    public function getText(): String
    {
        return $this->text;
    }
}
