<?php

namespace ByTIC\Omnipay\Euplatesc;

use ByTIC\Omnipay\Euplatesc\Message\PurchaseRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class Gateway
 * @package ByTIC\Mobilpay\Twispay
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

    /**
     * @var string
     */
    protected $endpointSandbox = 'http://sandboxsecure.mobilpay.ro';

    /**
     * @var string
     */
    protected $endpointLive = 'https://secure.mobilpay.ro';

    /**
     * @var string
     */
    protected $signature;

    /**
     * @var string|null Certificate Content
     */
    protected $certificate;

    /**
     * @var string|null PrivateKey Content
     */
    protected $privateKey;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Twispay';
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
            'signature' => $this->getSignature(),
            'certificate' => $this->getCertificate(),
            'privateKey' => $this->getPrivateKey(),
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

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param mixed $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return null|string
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * @param null|string $certificate
     */
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
    }


    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     */
    public function setPrivateKey(string $privateKey)
    {
        $this->privateKey = $privateKey;
    }

}
