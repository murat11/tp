<?php

namespace App\JobProcessor\Serializer;

use App\JobProcessor\JobResult;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class JobResponseNormalizer implements NormalizerInterface
{

    /**
     * @inheritdoc
     */
    public function normalize($object, $format = null, array $context = array())
    {
        /** @var JobResult $object */
        return (object) ['text' => $object->getText()];
    }

    /**
     * @inheritdoc
     */
    public function supportsNormalization($data, $format = null)
    {
        if (!($data instanceof JobResult)) {
            return false;
        }

        return true;
    }
}
