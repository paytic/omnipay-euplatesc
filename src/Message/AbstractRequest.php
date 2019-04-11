<?php

namespace ByTIC\Omnipay\Euplatesc\Message;

use ByTIC\Omnipay\Common\Helper;
use ByTIC\Omnipay\Common\Message\Traits\SendDataRequestTrait;
use ByTIC\Omnipay\Euplatesc\Traits\HasIntegrationParametersTrait;
use Omnipay\Common\Message\AbstractRequest as CommonAbstractRequest;

/**
 * Class AbstractRequest
 * @package ByTIC\Omnipay\Librapay\Message
 */
abstract class AbstractRequest extends CommonAbstractRequest
{
    use SendDataRequestTrait;
    use HasIntegrationParametersTrait;

    /**
     * @return mixed
     */
    public function getEndpointUrl()
    {
        return $this->getParameter('endpointUrl');
    }

    /**
     * @param $value
     * @return CommonAbstractRequest
     */
    public function setEndpointUrl($value)
    {
        return $this->setParameter('endpointUrl', $value);
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->getParameter('orderId');
    }

    /**
     * @param  string $value
     * @return mixed
     */
    public function setOrderId($value)
    {
        $value = Helper::stripNonAscii($value);
        return $this->setParameter('orderId', $value);
    }

    /**
     * @return string
     */
    public function getOrderName()
    {
        return $this->getParameter('orderName');
    }

    /**
     * @param  string $value
     * @return mixed
     */
    public function setOrderName($value)
    {
        $value = Helper::stripNonAscii($value);
        return $this->setParameter('orderName', $value);
    }

    /**
     * @param  string $value
     * @return mixed
     */
    public function setOrderDate($value)
    {
        return $this->setParameter('orderDate', $value);
    }

    /**
     * @return string
     */
    public function getOrderDate()
    {
        return $this->getParameter('orderDate');
    }

    /**
     * @return array
     */
    protected function validateDataFields()
    {
        return [
            'key',
            'mid',
            'card'
        ];
    }
}
