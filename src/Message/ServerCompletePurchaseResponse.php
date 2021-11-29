<?php

namespace Paytic\Omnipay\Euplatesc\Message;

use Paytic\Omnipay\Euplatesc\Message\Traits\CompletePurchaseResponseTrait;

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
