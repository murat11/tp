<?php

namespace App\JobProcessor;

use App\JobProcessor\ProcessingMethods\CallbackMethod;

class TextProcessingMethodFactory
{
    private $textProcessingMethods = [];

    /**
     * @param TextProcessingMethodInterface $textProcessingMethod
     * @param String $methodName
     */
    public function addTextProcessingMethod(TextProcessingMethodInterface $textProcessingMethod, String $methodName): void
    {
        $this->textProcessingMethods[$methodName] = $textProcessingMethod;
    }

    /**
     * @param String $methodName
     * @return TextProcessingMethodInterface
     */
    public function getTextProcessingMethod(String $methodName): TextProcessingMethodInterface
    {
        if (!isset($this->textProcessingMethods[$methodName])) {
            $nativeFunctionProcessingMethod = $this->createNativeFunctionProcessingMethod($methodName);
            if (is_null($nativeFunctionProcessingMethod)) {
                throw new \RuntimeException(
                    sprintf('Can not find or create %s text processing method', $methodName)
                );
            }
            $this->textProcessingMethods[$methodName] = $nativeFunctionProcessingMethod;
        }

        return $this->textProcessingMethods[$methodName];
    }

    private function createNativeFunctionProcessingMethod(String $methodName): ?TextProcessingMethodInterface
    {
        if (!function_exists($methodName)) {
            return null;
        }

        $textProcessingMethod = new CallbackMethod(function (String $text) use ($methodName) {
            return $methodName($text);
        });

        return $textProcessingMethod;
    }
}