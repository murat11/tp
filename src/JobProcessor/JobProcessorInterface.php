<?php

namespace App\JobProcessor;

interface JobProcessorInterface
{
    public function processJob(JobInterface $job): ResponseInterface;
}
