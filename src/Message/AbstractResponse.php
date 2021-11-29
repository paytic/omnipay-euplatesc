<?php

namespace Paytic\Omnipay\Euplatesc\Message;

use Paytic\Omnipay\Common\Message\Traits\DataAccessorsTrait;
use Omnipay\Common\Message\AbstractResponse as CommonAbstractResponse;

/**
 * Class Response
 * @package ByTIC\Omnipay\Librapay\Message
 */
abstract class AbstractResponse extends CommonAbstractResponse
{
    use DataAccessorsTrait;
}
