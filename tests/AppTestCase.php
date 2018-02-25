<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AppTestCase extends KernelTestCase
{
    /**
     * @return ContainerInterface
     */
    protected function getContainer(): ContainerInterface
    {
        if (!self::$kernel) {
            self::bootKernel();
        }

        return self::$kernel->getContainer();
    }
}
