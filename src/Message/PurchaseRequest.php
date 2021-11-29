<?php

namespace Paytic\Omnipay\Euplatesc\Message;

use Paytic\Omnipay\Common\Message\Traits\RequestDataGetWithValidationTrait;
use Paytic\Omnipay\Euplatesc\Helper;

/**
 * PayU Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    use RequestDataGetWithValidationTrait;

    /** @noinspection PhpMissingParentCallCommonInspection
     * @inheritdoc
     */
    public function validateDataFields()
    {
        $fields = array_merge(
            parent::validateDataFields(),
            [
                'amount',
                'currency',
                'orderId',
                'orderName',
//            'orderDate',
                'notifyUrl',
                'returnUrl',
                'key',
                'mid',
                'card'
            ]
        );
        return $fields;
    }

    /**
     * @inheritdoc
     */
    protected function populateData()
    {
        $data = [];

        $this->populateDataOrder($data);
        $this->populateDataCard($data);

        $data['redirectUrl'] = $this->getEndpointUrl();
        $data["fp_hash"] = $this->generateHmac($this->generateHashString($data['order']));
        $data["lang"] = $this->getLang();

        return $data;
    }

    /** @noinspection PhpDocMissingThrowsInspection
     * @param $data
     */
    protected function populateDataOrder(&$data)
    {
        $data['order'] = [
            'amount' => $this->getAmount(),
            'curr' => $this->getCurrency(),
            'invoice_id' => $this->getOrderId(),
            'order_desc' => $this->getOrderName(),
            'merch_id' => $this->getMid(),
            'timestamp' => gmdate("YmdHis"),
            'nonce' => md5(microtime() . mt_rand()),
        ];
    }

    /**
     * @param $data
     */
    protected function populateDataCard(&$data)
    {
        $card = $this->getCard();

        $data['bill'] = [
            'fname' => $card->getFirstName(),
            'lname' => $card->getLastName(),
            'country' => $card->getCountry(),
            'company' => $card->getBillingCompany(),
            'city' => $card->getCity(),
            'add' => $card->getAddress1() . ' ' . $card->getAddress2(),
            'email' => $card->getEmail(),
            'phone' => $card->getPhone(),
            'fax' => $card->getFax(),
            'ExtraData'  => $this->getParameter('ExtraData'),
        ];
    }

    /**
     * @param $data
     * @return string
     */
    protected function generateHmac($data)
    {
        $key = $this->getKey();

        return Helper::generateHmac($data, $key);
    }

    /**
     * @param array $data
     * @return string
     */
    public function generateHashString(array $data)
    {
        $return = "";
        foreach ($data as $digit) {
            $return .= Helper::generateHashFromString($digit);
        }

        return $return;
    }
}
