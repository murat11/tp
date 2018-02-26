<?php

namespace App\JobProcessor\Serializer;

use App\JobProcessor\TextProcessingJob;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class TextProcessingJobDenormalizer implements DenormalizerInterface
{

    /**
     * @inheritdoc
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $job = $data->job;
        $textProcessingJob = new TextProcessingJob($job->text, $job->methods);

        return $textProcessingJob;
    }

    /**
     * @inheritdoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        if (TextProcessingJob::class != $type) {
            return false;
        }
        if (!is_object($data) || !isset($data->job)) {
            return false;
        }

        return true;
    }
}
