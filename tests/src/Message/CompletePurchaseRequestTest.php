<?php

namespace ByTIC\Omnipay\Euplatesc\Tests\Message;

use ByTIC\Omnipay\Euplatesc\Message\CompletePurchaseRequest;
use ByTIC\Omnipay\Euplatesc\Message\CompletePurchaseResponse;
use ByTIC\Omnipay\Euplatesc\Tests\Fixtures\HttpRequestBuilder;

/**
 * Class CompletePurchaseRequestTest
 * @package ByTIC\Omnipay\Euplatesc\Tests\Message
 */
class CompletePurchaseRequestTest extends AbstractCompletePurchaseRequestTest
{
    public function testSimpleSend()
    {
        $this->simpleSendAssertions(
            HttpRequestBuilder::createCompletePurchase(),
            CompletePurchaseRequest::class,
            CompletePurchaseResponse::class
        );
    }
}
