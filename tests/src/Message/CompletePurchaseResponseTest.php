<?php
declare(strict_types=1);

namespace Paytic\Omnipay\Euplatesc\Tests\Message;

use Paytic\Omnipay\Euplatesc\Message\CompletePurchaseResponse;

/**
 *
 */
class CompletePurchaseResponseTest extends AbstractResponseTest
{
    /**
     * @param $code
     * @param $output
     * @return void
     * @dataProvider data_isSuccessful
     */
    public function test_isSuccessful($code, $output)
   {
       $response = \Mockery::mock(CompletePurchaseResponse::class)->makePartial();
       $response->shouldReceive('getCode')->andReturn($code);

       self::assertSame($output, $response->isSuccessful());
   }

    public function data_isSuccessful()
    {
        return [
            [0, true],
            ['0', true],
            [9, false],
            ['9', false],
            ['', false],
            ['s', false],
            [null, false],
        ];
    }
}