<?php

namespace Paytic\Omnipay\Euplatesc\Message;

use Paytic\Omnipay\Euplatesc\Message\Traits\CompletePurchaseRequestTrait;

/**
 * Class PurchaseResponse
 * @package ByTIC\Common\Payments\Gateways\Providers\AbstractGateway\Messages
 */
class ServerCompletePurchaseRequest extends AbstractRequest
{
    use CompletePurchaseRequestTrait;
}
