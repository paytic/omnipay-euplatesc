<?php
declare(strict_types=1);

namespace Paytic\Omnipay\Euplatesc\Message\Traits;

use Paytic\Omnipay\Common\Message\Traits\GatewayNotificationResponseTrait;
use DateTime;
use Paytic\Omnipay\Euplatesc\Message\CompletePurchaseResponse;

/**
 * Class CompletePurchaseResponseTrait
 * @package Paytic\Omnipay\Euplatesc\Message\Traits
 */
trait CompletePurchaseResponseTrait
{
    use GatewayNotificationResponseTrait;

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful(): bool
    {
        $code = $this->getCode();
        if (is_int($code)) {
            $code = (string) $code;
        }

        return $code === CompletePurchaseResponse::CODE_SUCCESS;
    }

    /** @noinspection PhpMissingParentCallCommonInspection
     * Status code (string)
     *
     * @return string
     */
    public function getCode()
    {
        return $this->hasNotificationDataItem('action') ? $this->getNotificationDataItem('action') : null;
    }

    /** @noinspection PhpMissingParentCallCommonInspection
     * Gateway Reference
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        return $this->hasNotificationDataItem('ep_id') ? $this->getNotificationDataItem('ep_id') : null;
    }

    /** @noinspection PhpMissingParentCallCommonInspection
     * Get the transaction ID as generated by the merchant website.
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->hasNotificationDataItem('invoice_id') ? $this->getNotificationDataItem('invoice_id') : null;
    }

    /** @noinspection PhpMissingParentCallCommonInspection
     * @return false|string
     */
    public function getTransactionDate()
    {
        if (!$this->hasNotificationDataItem('timestamp')) {
            return null;
        }
        $timestamp = $this->getNotificationDataItem('timestamp');
        $dateTime = DateTime::createFromFormat('YmdHis', $timestamp);

        return $dateTime->format('Y-m-d H:i:s');
    }

    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return $this->hasNotificationDataItem('message') ? $this->getNotificationDataItem('message') : null;
    }

    /** @noinspection PhpMissingParentCallCommonInspection
     * @return bool
     */
    protected function canProcessModel()
    {
        return $this->hasDataProperty('notification');
    }
}
