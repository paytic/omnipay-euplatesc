<?php

namespace ByTIC\Omnipay\Euplatesc\Message;

use ByTIC\Omnipay\Euplatesc\Message\Traits\CompletePurchaseResponseTrait;

/**
 * Class PurchaseResponse
 * @package ByTIC\Common\Payments\Gateways\Providers\AbstractGateway\Messages
 */
class ServerCompletePurchaseResponse extends AbstractResponse
{
    use CompletePurchaseResponseTrait;

    /**
     * @return string
     */
    public function getContent()
    {
        return 'OK';
    }
}
