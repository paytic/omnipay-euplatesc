<?php

use Dotenv\Dotenv;

define('PROJECT_BASE_PATH', __DIR__ . '/..');
define('TEST_BASE_PATH', __DIR__);
define('TEST_FIXTURE_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'fixtures');

require dirname(__DIR__) . '/vendor/autoload.php';
require __DIR__ . '/loadEnv.php';
