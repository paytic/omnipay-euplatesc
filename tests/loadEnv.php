<?php

if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . '.env')) {
    $env = new Dotenv\Dotenv(__DIR__);
    $env->load();
}
