<?php

namespace ByTIC\Omnipay\Euplatesc\Tests\Message;

use ByTIC\Omnipay\Euplatesc\Message\ServerCompletePurchaseRequest;
use ByTIC\Omnipay\Euplatesc\Message\ServerCompletePurchaseResponse;
use ByTIC\Omnipay\Euplatesc\Tests\Fixtures\HttpRequestBuilder;

/**
 * Class ServerCompletePurchaseRequestTest
 * @package ByTIC\Omnipay\Euplatesc\Tests\Message
 */
class ServerCompletePurchaseRequestTest extends AbstractCompletePurchaseRequestTest
{
    public function testSimpleSend()
    {
        $this->simpleSendAssertions(
            HttpRequestBuilder::createServerCompletePurchase(),
            ServerCompletePurchaseRequest::class,
            ServerCompletePurchaseResponse::class
        );
    }
}
