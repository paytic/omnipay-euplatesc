<?php

namespace ByTIC\Omnipay\Euplatesc\Tests\Message;

use ByTIC\Omnipay\Euplatesc\Message\ServerCompletePurchaseRequest;
use ByTIC\Omnipay\Euplatesc\Message\ServerCompletePurchaseResponse;
use ByTIC\Omnipay\Euplatesc\Tests\Fixtures\HttpRequestBuilder;
use Guzzle\Http\Client as HttpClient;

/**
 * Class ServerCompletePurchaseRequestTest
 * @package ByTIC\Omnipay\Euplatesc\Tests\Message
 */
class ServerCompletePurchaseRequestTest extends AbstractRequestTest
{

    public function testSimpleSend()
    {
        $client = new HttpClient();
        $httpRequest = HttpRequestBuilder::createCompletePurchase();

        $request = new ServerCompletePurchaseRequest($client, $httpRequest);
        $request->setKey(getenv('EUPLATESC_KEY'));

        /** @var CompletePurchaseResponse $response */
        $response = $request->send();
        self::assertInstanceOf(ServerCompletePurchaseResponse::class, $response);
        self::assertSame($httpRequest->request->get('invoice_id'), $response->getTransactionId());
        self::assertSame('2015-01-22 14:48:55', $response->getTransactionDate());
        self::assertSame(true, $response->isSuccessful());
    }

}
