<?php

require 'init.php';

$gateway = new \Paytic\Omnipay\Euplatesc\Gateway();

$parameters = require TEST_FIXTURE_PATH . 'simpleOrderParams.php';
$parameters = require TEST_FIXTURE_PATH . 'enviromentParams.php';

$parameters['returnUrl'] = str_replace(
    'card-redirect.php',
    'card-return.php',
    'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']
);

$request = $gateway->purchase($parameters);
$response = $request->send();

// Send the Symfony HttpRedirectResponse
$response->send();
