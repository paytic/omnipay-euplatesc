<?php

namespace ByTIC\Omnipay\Euplatesc\Tests\Message;

use ByTIC\Omnipay\Euplatesc\Message\CompletePurchaseRequest;
use ByTIC\Omnipay\Euplatesc\Message\CompletePurchaseResponse;
use ByTIC\Omnipay\Euplatesc\Tests\Fixtures\HttpRequestBuilder;
/**
 * Class CompletePurchaseRequestTest
 * @package ByTIC\Omnipay\Euplatesc\Tests\Message
 */
class CompletePurchaseRequestTest extends AbstractRequestTest
{
    public function testSimpleSend()
    {
        $client = $this->getHttpClient();
        $httpRequest = HttpRequestBuilder::createServerCompletePurchase();

        $request = new CompletePurchaseRequest($client, $httpRequest);
        $request->setKey(getenv('EUPLATESC_KEY'));

        /** @var CompletePurchaseResponse $response */
        $response = $request->send();
        self::assertInstanceOf(CompletePurchaseResponse::class, $response);
        self::assertSame($httpRequest->request->get('invoice_id'), $response->getTransactionId());
        self::assertSame('2015-01-22 14:48:55', $response->getTransactionDate());
        self::assertSame(true, $response->isSuccessful());
    }
}
