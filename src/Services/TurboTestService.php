<?php

namespace App\Services;

use App\JobProcessor\TextProcessingJob;
use App\JobProcessor\TextProcessor;
use Symfony\Component\Serializer\SerializerInterface;

class TurboTestService
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var TextProcessor
     */
    private $jobProcessor;

    public function __construct(SerializerInterface $serializer, TextProcessor $jobProcessor)
    {
        $this->serializer = $serializer;
        $this->jobProcessor = $jobProcessor;
    }

    /**
     * @param String $jobString
     * @return String
     */
    public function doProcessing(String $jobString): String
    {
        /** @var TextProcessingJob $job */
        $job = $this->serializer->deserialize($jobString, TextProcessingJob::class, 'json');
        /** @var TextProcessor $response */
        $response = $this->jobProcessor->processJob($job);
        $output = $this->serializer->serialize($response, 'json');

        return $output;
    }
}
