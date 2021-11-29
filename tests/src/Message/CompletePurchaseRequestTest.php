<?php

namespace Paytic\Omnipay\Euplatesc\Tests\Message;

use Paytic\Omnipay\Euplatesc\Message\CompletePurchaseRequest;
use Paytic\Omnipay\Euplatesc\Message\CompletePurchaseResponse;
use Paytic\Omnipay\Euplatesc\Tests\Fixtures\HttpRequestBuilder;

/**
 * Class CompletePurchaseRequestTest
 * @package Paytic\Omnipay\Euplatesc\Tests\Message
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
