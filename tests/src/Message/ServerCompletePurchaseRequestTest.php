<?php

namespace Paytic\Omnipay\Euplatesc\Tests\Message;

use Paytic\Omnipay\Euplatesc\Message\ServerCompletePurchaseRequest;
use Paytic\Omnipay\Euplatesc\Message\ServerCompletePurchaseResponse;
use Paytic\Omnipay\Euplatesc\Tests\Fixtures\HttpRequestBuilder;

/**
 * Class ServerCompletePurchaseRequestTest
 * @package Paytic\Omnipay\Euplatesc\Tests\Message
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
