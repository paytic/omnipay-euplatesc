<?php

namespace ByTIC\Omnipay\Euplatesc;

/**
 * Class Helper
 * @package ByTIC\Omnipay\Euplatesc
 */
class Helper
{

    /**
     * @param $string
     * @return string
     */
    public static function generateHashFromString($string)
    {
        if ($string === null || strlen($string) == 0) {
            $return = '-'; // valorile nule sunt inlocuite cu -
        } else {
            $return = strlen($string).$string;
        }

        return $return;
    }

    /**
     * @param $data
     * @param $secretKey
     * @return string
     */
    public static function generateHmac($data, $secretKey)
    {
        $key = pack('H*', $secretKey);
        $blocksize = 64;
        $hashfunc = 'md5';

        if (strlen($key) > $blocksize) {
            $key = pack('H*', $hashfunc($key));
        }

        $key = str_pad($key, $blocksize, chr(0x00));
        $ipad = str_repeat(chr(0x36), $blocksize);
        $opad = str_repeat(chr(0x5c), $blocksize);

        $hmac = pack('H*', $hashfunc(($key ^ $opad).pack('H*', $hashfunc(($key ^ $ipad).$data))));

        return bin2hex($hmac);
    }
}
