<?php

$parameters = isset($parameters) ? $parameters : [];
foreach (['mid', 'key'] as $field) {
    $parameters[$field] = getenv('EUPLATESC_' . strtoupper($field));
}
return $parameters;
