<?php

namespace Paytic\Omnipay\Euplatesc\Tests\Message;

use Paytic\Omnipay\Euplatesc\Message\CompletePurchaseRequest;
use Paytic\Omnipay\Euplatesc\Message\CompletePurchaseResponse;
use Paytic\Omnipay\Euplatesc\Tests\Fixtures\HttpRequestBuilder;

/**
 * Class AbstractCompletePurchaseRequestTest
 * @package Paytic\Omnipay\Euplatesc\Tests\Message
 */
abstract class AbstractCompletePurchaseRequestTest extends AbstractRequestTest
{

    /**
     * @param $httpRequest
     * @param $requestClass
     * @param $responseClass
     */
    protected function simpleSendAssertions($httpRequest, $requestClass, $responseClass)
    {
        $client = $this->getHttpClient();

        $request = new $requestClass($client, $httpRequest);
        $request->setKey(getenv('EUPLATESC_KEY'));

        /** @var CompletePurchaseResponse $response */
        $response = $request->send();
        self::assertInstanceOf($responseClass, $response);
        self::assertSame($httpRequest->request->get('invoice_id'), $response->getTransactionId());
        self::assertSame('2015-01-22 14:48:55', $response->getTransactionDate());
        self::assertSame(true, $response->isSuccessful());
    }
}
