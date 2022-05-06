<?php
declare(strict_types=1);

namespace Paytic\Omnipay\Euplatesc\Message;

use Paytic\Omnipay\Common\Message\Traits\HtmlResponses\ConfirmHtmlTrait;
use Paytic\Omnipay\Euplatesc\Message\Traits\CompletePurchaseResponseTrait;

/**
 * Class PurchaseResponse
 * @package ByTIC\Common\Payments\Gateways\Providers\AbstractGateway\Messages
 */
class CompletePurchaseResponse extends AbstractResponse
{
    public const CODE_SUCCESS = '0';

    use ConfirmHtmlTrait;
    use CompletePurchaseResponseTrait;
}
