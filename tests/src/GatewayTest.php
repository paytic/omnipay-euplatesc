<?php

namespace ByTIC\Omnipay\Euplatesc\Tests;

use ByTIC\Omnipay\Euplatesc\Gateway;
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

    public function setUp()
    {
        parent::setUp();
        $this->gateway = new Gateway(
            $this->getHttpClient(),
            $this->getHttpRequest()
        );
    }
}
