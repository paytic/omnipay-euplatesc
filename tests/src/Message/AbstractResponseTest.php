<?php

namespace ByTIC\Omnipay\Euplatesc\Tests\Message;

use ByTIC\Omnipay\Euplatesc\Message\AbstractRequest;
use ByTIC\Omnipay\Euplatesc\Tests\AbstractTest;
use Omnipay\Common\Message\AbstractResponse;

/**
 * Class AbstractResponseTest
 * @package ByTIC\Omnipay\Euplatesc\Tests\Message
 */
abstract class AbstractResponseTest extends AbstractTest
{

    /**
     * @param string $class Request Class
     * @param array $data
     * @return AbstractResponse|\Omnipay\Common\Message\ResponseInterface
     */
    protected function newResponse($class, $data = [])
    {
        $client = $this->getHttpClient();
        $request = $this->getHttpRequest();
        /** @var AbstractRequest $request */
        $request = new $class($client, $request);
        if ($request->sendData($data)) {
            return $request->getResponse();
        }
        return null;
    }
}
