<?php

namespace App\Tests\Integration;

use App\Services\TurboTestService;
use App\Tests\AppTestCase;

class TurboTestServiceTestCase extends AppTestCase
{

    /**
     * @dataProvider jobsProvider
     */
    public function testDoProcessing($jobObject, $expectedResult)
    {
        $container = $this->getContainer();
        /** @var TurboTestService $turboTestService */
        $turboTestService = $container->get('turboparser');
        $actualResult = $turboTestService->doProcessing(json_encode($jobObject));
        
        $this->assertEquals($expectedResult, json_decode($actualResult, true));
    }
    
    public function jobsProvider() 
    {
        return [
            [
                [
                    'job' => [
                        'text' => 'Привет, мне на <a href="test@test.ru">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!',
                        'methods' => ['stripTags', 'removeSpaces', 'replaceSpacesToEol', 'htmlspecialchars', 'removeSymbols', 'toNumber']
                    ]
                ],
                [
                    'text' => 10
                ]
            ],
            [
                [
                    'job' => [
                        'text' => ' Yubve ',
                        'methods' => ['trim', 'strtolower']
                    ]
                ],
                [
                    'text' => 'yubve'
                ]
            ],
            [
                [
                    'job' => [
                        'text' => 'aaa aaa aaa',
                        'methods' => ['replaceSpacesToEol']
                    ]
                ],
                [
                    'text' => implode(PHP_EOL, ['aaa', 'aaa', 'aaa'])
                ]
            ]
        ];
    }
}
