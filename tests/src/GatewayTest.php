<?php

namespace ByTIC\Omnipay\Euplatesc\Tests;

use ByTIC\Omnipay\Euplatesc\Gateway;
use ByTIC\Omnipay\Euplatesc\Message\PurchaseRequest;

/**
 * Class HelperTest
 * @package ByTIC\Omnipay\Twispay\Tests
 */
class GatewayTest extends AbstractTest
{
    public function testGetSecureUrl()
    {
        $gateway = new Gateway();

        // INITIAL TEST MODE IS TRUE
        self::assertEquals(
            'https://secure.euplatesc.ro/tdsprocess/tranzactd.php',
            $gateway->getEndpointUrl()
        );

        $gateway->setTestMode(true);
        self::assertEquals(
            'https://secure.euplatesc.ro/tdsprocess/tranzactd.php',
            $gateway->getEndpointUrl()
        );

        $gateway->setTestMode(false);
        self::assertEquals(
            'https://secure.euplatesc.ro/tdsprocess/tranzactd.php',
            $gateway->getEndpointUrl()
        );
    }

    public function testPurchaseRequestEndpointUrl()
    {
        $gateway = new Gateway();

        $request = $gateway->purchase();
        self::assertInstanceOf(PurchaseRequest::class, $request);
    }
}
