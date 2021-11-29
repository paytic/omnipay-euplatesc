<?php

namespace Paytic\Omnipay\Euplatesc\Tests\Fixtures;

use Symfony\Component\HttpFoundation\Request as HttpRequest;

/**
 * Class HttpRequestBuilder
 * @package Paytic\Omnipay\Euplatesc\Tests\Fixtures
 */
class HttpRequestBuilder
{
    /**
     * @return HttpRequest
     */
    public static function createCompletePurchase()
    {
        $request = self::create();
        $request->request->add(self::getFileContents('completePurchaseParams'));

        return $request;
    }

    /**
     * @return HttpRequest
     */
    public static function createServerCompletePurchase()
    {
        $request = self::create();
        $request->request->add(self::getFileContents('serverCompletePurchaseParams'));

        return $request;
    }

    /**
     * @return HttpRequest
     */
    public static function create()
    {
        $request = new HttpRequest();

        return $request;
    }

    /**
     * @param $file
     * @return array
     */
    public static function getFileContents($file)
    {
        return require TEST_FIXTURE_PATH . '/requests/' . $file . '.php';
    }
}
