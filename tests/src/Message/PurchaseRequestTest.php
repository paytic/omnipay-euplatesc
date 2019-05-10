<?php

namespace ByTIC\Omnipay\Euplatesc\Tests\Message;

use ByTIC\Omnipay\Euplatesc\Message\PurchaseRequest;
use ByTIC\Omnipay\Euplatesc\Message\PurchaseResponse;
use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Class PurchaseRequestTest
 * @package ByTIC\Omnipay\Euplatesc\Tests\Message
 */
class PurchaseRequestTest extends AbstractRequestTest
{
    public function testInitParameters()
    {
        $data = [
            'mid' => 222,
            'key' => 333,
            'endpointUrl' => 444,
        ];
        $request = $this->newRequestWithInitTest(PurchaseRequest::class, $data);
        self::assertEquals($data['mid'], $request->getMid());
        self::assertEquals($data['key'], $request->getKey());
        self::assertEquals($data['endpointUrl'], $request->getEndpointUrl());
    }

    public function testSendWithMissingAmount()
    {
        $data = [
            'mid' => 111,
            'key' => 333,
            'card' => [
                'first_name' => '',
            ],
            'endpointUrl' => 444,
        ];
        $request = $this->newRequestWithInitTest(PurchaseRequest::class, $data);

        self::expectException(InvalidRequestException::class);
        self::expectExceptionMessage('The amount parameter is required');
        $request->send();
    }

    public function testSend()
    {
        $data = [
            'mid' => getenv('EUPLATESC_MID'),
            'key' => getenv('EUPLATESC_KEY'),
            'orderId' => '99999897987987987987987',
            'orderName' => 'Test tranzaction 9999999999',
            'notifyUrl' => 'http://localhost',
            'returnUrl' => 'http://localhost',
            'endpointUrl' => 'https://secure.euplatesc.ro/tdsprocess/tranzactd.php',
            'card' => [
                'first_name' => '',
            ],
            'amount' => 20.00,
            'currency' => 'RON',
        ];
        $this->sendValidation($data);
    }

    public function testSendWithSpecialCharacters()
    {
        $data = [
            'mid' => getenv('EUPLATESC_MID'),
            'key' => getenv('EUPLATESC_KEY'),
            'orderId' => "999998'!@#$%^&*()97987987987987987",
            'orderName' => "Test tranzaction 9999999999'!@#$%^&*()",
            'notifyUrl' => 'http://localhost',
            'returnUrl' => 'http://localhost',
            'endpointUrl' => 'https://secure.euplatesc.ro/tdsprocess/tranzactd.php',
            'card' => [
                'first_name' => '',
            ],
            'amount' => 20.00,
            'currency' => 'RON',
        ];
        $this->sendValidation($data);
    }

    /**
     * @param $data
     */
    protected function sendValidation($data)
    {
        $request = $this->newRequestWithInitTest(PurchaseRequest::class, $data);

        /** @var PurchaseResponse $response */
        $response = $request->send();
        self::assertInstanceOf(PurchaseResponse::class, $response);

        $redirectData = $response->getRedirectData();
        self::assertCount(18, $redirectData);

        $client = $this->getHttpClient();
        $client->setConfig(
            [
                'curl.CURLOPT_SSL_VERIFYHOST' => false,
                'curl.CURLOPT_SSL_VERIFYPEER' => false,
//                HttpClient::SSL_CERT_AUTHORITY => 'system'
            ]
        );

        $client->setSslVerification(false, false);
        $gatewayResponse = $client->post($response->getRedirectUrl(), null, $redirectData)->send();
        self::assertSame(200, $gatewayResponse->getStatusCode());
        self::assertTrue(strpos($gatewayResponse->getEffectiveUrl(), 'secure.euplatesc.ro') !== false);

        //Validate first Response
        $body = strtolower($gatewayResponse->getBody(true));
        self::assertContains("<meta http-equiv='refresh' content=", $body);

        if (preg_match('/\<meta[^\>]+http-equiv=\'refresh\' content=\'.*?url=(.*?)\'/i', $body, $matches)) {
            $url = $matches[1];
            $gatewayResponse = $client->get($url)->send();
            $body = $gatewayResponse->getBody(true);
        }

        self::assertContains('Num&#259;r comand&#259;:', $body);
        self::assertContains('Descriere comand&#259;:', $body);
        self::assertContains(number_format($data['amount'], 2) . ' LEI', $body);
    }
}
