<?php

namespace Paytic\Omnipay\Euplatesc\Tests;

use Paytic\Omnipay\Euplatesc\Gateway;
use Omnipay\Tests\GatewayTestCase;

/**
 * Class HelperTest
 * @package ByTIC\Omnipay\Twispay\Tests
 */
class GatewayTest extends GatewayTestCase
{
    public function testGetSecureUrl()
    {
        // INITIAL TEST MODE IS TRUE
        self::assertEquals(
            'https://secure.euplatesc.ro/tdsprocess/tranzactd.php',
            $this->gateway->getEndpointUrl()
        );

        $this->gateway->setTestMode(true);
        self::assertEquals(
            'https://secure.euplatesc.ro/tdsprocess/tranzactd.php',
            $this->gateway->getEndpointUrl()
        );

        $this->gateway->setTestMode(false);
        self::assertEquals(
            'https://secure.euplatesc.ro/tdsprocess/tranzactd.php',
            $this->gateway->getEndpointUrl()
        );
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->gateway = new Gateway(
            $this->getHttpClient(),
            $this->getHttpRequest()
        );
    }
}
