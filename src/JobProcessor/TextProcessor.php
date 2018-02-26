<?php

namespace App\JobProcessor;

class TextProcessor
{

    /**
     * @var TextProcessingMethodFactory
     */
    private $textProcessingMethodFactory;

    public function __construct(TextProcessingMethodFactory $textProcessingMethodFactory)
    {
        $this->textProcessingMethodFactory = $textProcessingMethodFactory;
    }

    /**
     * @param TextProcessingJob $job
     * @return JobResult
     */
    public function processJob(TextProcessingJob $job): JobResult
    {
        $text = $job->getText();
        foreach ($job->getMethods() as $methodName) {
            $textProcessingMethod = $this->textProcessingMethodFactory->getTextProcessingMethod($methodName);
            $text = $textProcessingMethod->processText($text);
        }

        return new JobResult($text);
    }
}
//stripTags", "removeSpaces", "replaceSpacesToEol", "htmlspecialchars", "removeSymbols", "toNumber