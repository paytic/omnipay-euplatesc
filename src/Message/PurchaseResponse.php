<?php

namespace Paytic\Omnipay\Euplatesc\Message;

use Paytic\Omnipay\Common\Message\Traits\RedirectHtmlTrait;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * PayU Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    use RedirectHtmlTrait;

    /**
     * @return array
     */
    public function getRedirectData()
    {
        $data = array_merge($this->getDataProperty('order'), $this->getDataProperty('bill'));
        $data['fp_hash'] = $this->getDataProperty('fp_hash');
        $data['lang'] = $this->getDataProperty('lang', 'ro');

        return $data;
    }
}
