<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AppTestCase extends KernelTestCase
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @return ContainerInterface
     */
    protected function getContainer(): ?ContainerInterface
    {
        if (!$this->container) {
            self::bootKernel();
            $this->container = self::$kernel->getContainer();
        }

        return $this->container;
    }
}
