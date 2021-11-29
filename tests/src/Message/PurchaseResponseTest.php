<?php

namespace Paytic\Omnipay\Euplatesc\Tests\Message;

use Paytic\Omnipay\Euplatesc\Message\PurchaseRequest;
use Paytic\Omnipay\Euplatesc\Message\PurchaseResponse;

/**
 * Class PurchaseResponseTest
 * @package Paytic\Omnipay\Euplatesc\Tests\Message
 */
class PurchaseResponseTest extends AbstractResponseTest
{
    public function testGetRedirectData()
    {
        $data = [
            'order' => [
                'amount' => '20.00',
                'curr' => 'RON',
                'invoice_id' => '99999897987987987987987',
                'order_desc' => 'Test tranzaction 9999999999',
                'merch_id' => '44840978913',
                'timestamp' => '20190409161554',
                'nonce' => 'ecf90ff89bc67710d9b6b357b91a1774',
            ],
            'bill' => [
                'fname' => '',
                'lname' => '',
            ],
            'redirectUrl' => '111',
            'fp_hash' => '999',
        ];
        /** @var PurchaseResponse $response */
        $response = $this->newResponse(PurchaseRequest::class, $data);
        self::assertInstanceOf(PurchaseResponse::class, $response);
        self::assertSame($data['redirectUrl'], $response->getRedirectUrl());

        $data = $response->getRedirectData();

        self::assertCount(11, $data);
        self::assertSame('999', $data['fp_hash']);
    }
}
