<?php

namespace App\Services;

use App\JobProcessor;
use Symfony\Component\Serializer\SerializerInterface;

class TurboTestService
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var JobProcessor\JobProcessorInterface
     */
    private $jobProcessor;

    /**
     * TurboTestService constructor.
     * @param SerializerInterface $serializer
     * @param JobProcessor\JobProcessorInterface $jobProcessor
     */
    public function __construct(SerializerInterface $serializer, JobProcessor\JobProcessorInterface $jobProcessor)
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
        /** @var JobProcessor\JobInterface $job */
        $job = $this->serializer->deserialize($jobString, JobProcessor\JobInterface::class, 'json');
        /** @var JobProcessor\ResponseInterface $response */
        $response = $this->jobProcessor->processJob($job);
        $output = $this->serializer->serialize($response, 'json');

        return $output;
    }
}
