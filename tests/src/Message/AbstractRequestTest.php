<?php

namespace Paytic\Omnipay\Euplatesc\Tests\Message;

use Paytic\Omnipay\Euplatesc\Message\AbstractRequest;
use Paytic\Omnipay\Euplatesc\Tests\AbstractTest;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * Class AbstractRequestTest
 * @package Paytic\Omnipay\Euplatesc\Tests\Message
 */
abstract class AbstractRequestTest extends AbstractTest
{

    /**
     * @param string $class
     * @param array $data
     * @return AbstractRequest
     */
    protected function newRequestWithInitTest($class, $data)
    {
        $request = $this->newRequest($class);
        self::assertInstanceOf($class, $request);
        $request->initialize($data);
        return $request;
    }

    /**
     * @param string $class
     * @return AbstractRequest
     */
    protected function newRequest($class)
    {
        $client = $this->getHttpClient();
        $request = $this->getHttpRequest();
        $request = new $class($client, $request);
        return $request;
    }
}
