<?php

namespace App\JobProcessor;

interface TextProcessingMethodInterface
{
    /**
     * @param String $text
     * @return String
     */
    public function processText(String $text): String;
}