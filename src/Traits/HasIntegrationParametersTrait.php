<?php

namespace ByTIC\Omnipay\Euplatesc\Traits;

/**
 * Trait HasIntegrationParametersTrait
 * @package ByTIC\Omnipay\Euplatesc\Traits
 */
trait HasIntegrationParametersTrait
{

    /**
     * @param $value
     * @return mixed
     */
    public function setMid($value)
    {
        return $this->setParameter('mid', $value);
    }
    /**
     * @param $value
     * @return mixed
     */
    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }
    /**
     * @return mixed
     */
    public function getMid()
    {
        return $this->getParameter('mid');
    }
    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setExtraData($value) {
        return $this->setParameter('ExtraData', $value);
    }

    public function getExtraData()
    {
        return $this->getParameter('ExtraData');
    }
}
