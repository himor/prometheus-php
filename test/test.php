<?php

require_once '../vendor/autoload.php';

$client = new Prometheus\Client([
    'base_uri' => 'http://192.168.229.173:9091',
]);

$counter = $client->newCounter([
    'namespace' => 'viacom',
    'subsystem' => 'prometheus',
    'name'      => 'count',
    'help'      => 'Counting some numbers',
]);

$counter->increment(['fail' => 1]);
$counter->increment(['fail' => 1]);
$counter->increment(['fail' => 1]);
$counter->increment(['fail' => 1]);

$counter->increment(['happy' => 2]);
$counter->increment(['happy' => 2]);

$counter->increment(['lock' => 3]);
$counter->increment(['lock' => 4]);

$client->sendStats();

