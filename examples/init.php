<?php

require dirname(__DIR__) . '/vendor/autoload.php';

define('TEST_BASE_PATH', dirname(__DIR__) . '/tests/');
define('TEST_FIXTURE_PATH', TEST_BASE_PATH . '/fixtures/');

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'tests' . '/loadEnv.php';
