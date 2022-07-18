<?php

require __DIR__ . '/vendor/autoload.php';

use tiny\helper\Config;

$args = getopt('r:');

//载入配置
Config::init();

$opts = $args['r'] ?? '';
if (empty($opts)) {
    throw new Exception('opts cannot be empty! php index-cli.php -r controller/action');
}

$route = new \tiny\Route($opts);

$route->dispatch();