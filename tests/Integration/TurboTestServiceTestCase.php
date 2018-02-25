<?php

namespace App\Tests\Integration;

use App\Services\TurboTestService;
use App\Tests\AppTestCase;

class TurboTestServiceTestCase extends AppTestCase
{

    public function testDoProcessing()
    {
        $container = $this->getContainer();
        /** @var TurboTestService $turboTestService */
        $turboTestService = $container->get('turboparser');
        $result = $turboTestService->doProcessing('');
        $this->assertNotEmpty($result);
    }
}
