<?php

use Dotenv\Dotenv;

define('PROJECT_BASE_PATH', __DIR__ . '/..');
define('TEST_BASE_PATH', __DIR__);
define('TEST_FIXTURE_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'fixtures');

require dirname(__DIR__) . '/vendor/autoload.php';

if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . '.env')) {
    $enviroment = new Dotenv(__DIR__);
    $enviroment->load();
}
