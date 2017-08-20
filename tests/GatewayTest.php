<?php

namespace ByTIC\Omnipay\Euplatesc\Tests;

use ByTIC\Omnipay\Mobilpay\Gateway;
use ByTIC\Omnipay\Mobilpay\Message\PurchaseRequest;

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
            'http://sandboxsecure.mobilpay.ro',
            $gateway->getEndpointUrl()
        );
    }

}
