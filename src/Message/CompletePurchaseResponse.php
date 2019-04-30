<?php

namespace ByTIC\Omnipay\Euplatesc\Message;

use ByTIC\Omnipay\Common\Message\Traits\HtmlResponses\ConfirmHtmlTrait;
use ByTIC\Omnipay\Euplatesc\Message\Traits\CompletePurchaseResponseTrait;

/**
 * Class PurchaseResponse
 * @package ByTIC\Common\Payments\Gateways\Providers\AbstractGateway\Messages
 */
class CompletePurchaseResponse extends AbstractResponse
{
    use ConfirmHtmlTrait;
    use CompletePurchaseResponseTrait;
}
