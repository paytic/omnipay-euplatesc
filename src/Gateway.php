<?php

namespace ByTIC\Omnipay\Euplatesc;

use ByTIC\Omnipay\Euplatesc\Message\CompletePurchaseRequest;
use ByTIC\Omnipay\Euplatesc\Message\PurchaseRequest;
use ByTIC\Omnipay\Euplatesc\Message\ServerCompletePurchaseRequest;
use ByTIC\Omnipay\Euplatesc\Traits\HasIntegrationParametersTrait;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class Gateway
 * @package ByTIC\Omnipay\Euplatesc
 *
 * @method RequestInterface authorize(array $options = [])
 * @method RequestInterface completeAuthorize(array $options = [])
 * @method RequestInterface capture(array $options = [])
 * @method RequestInterface refund(array $options = [])
 * @method RequestInterface void(array $options = [])
 * @method RequestInterface createCard(array $options = [])
 * @method RequestInterface updateCard(array $options = [])
 * @method RequestInterface deleteCard(array $options = [])

 */
class Gateway extends AbstractGateway
{
    use HasIntegrationParametersTrait;

    protected $endpointLive = 'https://secure.euplatesc.ro/tdsprocess/tranzactd.php';

    protected $endpointSandbox = 'https://secure.euplatesc.ro/tdsprocess/tranzactd.php';

    /**
     * @return bool
     */
    public function isActive()
    {
        if ($this->getMid() && $this->getKey()) {
            return true;
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Euplatesc';
    }

    // ------------ REQUESTS ------------ //

    /**
     * @inheritdoc
     */
    public function purchase(array $parameters = []): RequestInterface
    {
        $parameters['endpointUrl'] = $this->getEndpointUrl();

        return $this->createRequest(
            PurchaseRequest::class,
            array_merge($this->getDefaultParameters(), $parameters)
        );
    }

    /**
     * @inheritdoc
     */
    public function completePurchase(array $parameters = []): RequestInterface
    {
        return $this->createRequest(
            CompletePurchaseRequest::class,
            array_merge($this->getDefaultParameters(), $parameters)
        );
    }

    /**
     * @inheritdoc
     */
    public function serverCompletePurchase(array $parameters = []): RequestInterface
    {
        return $this->createRequest(
            ServerCompletePurchaseRequest::class,
            array_merge($this->getDefaultParameters(), $parameters)
        );
    }
    // ------------ PARAMETERS ------------ //

    /** @noinspection PhpMissingParentCallCommonInspection
     *
     * {@inheritdoc}
     */
    public function getDefaultParameters()
    {
        return [
            'testMode' => true, // Must be the 1st in the list!
            'mid' => $this->getMid(),
            'key' => $this->getKey()
        ];
    }


    /**
     * Get live- or testURL.
     */
    public function getEndpointUrl()
    {
        $defaultUrl = $this->getTestMode() === false
            ? $this->endpointLive
            : $this->endpointSandbox;
        return $this->parameters->get('endpointUrl', $defaultUrl);
    }

    /**
     * @param  boolean $value
     * @return $this|AbstractGateway
     */
    public function setTestMode($value)
    {
        $this->parameters->remove('endpointUrl');
        return parent::setTestMode($value);
    }

    // ------------ Getter'n'Setters ------------ //
}
