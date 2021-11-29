<?php

namespace Paytic\Omnipay\Euplatesc\Tests\Message;

use Paytic\Omnipay\Euplatesc\Message\AbstractRequest;
use Paytic\Omnipay\Euplatesc\Tests\AbstractTest;
use Omnipay\Common\Message\AbstractResponse;

/**
 * Class AbstractResponseTest
 * @package Paytic\Omnipay\Euplatesc\Tests\Message
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
