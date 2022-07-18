<?php

require __DIR__ . '/vendor/autoload.php';

use monitor\helper\Config;

$args = getopt('r:');

//载入配置
Config::init();

$route = new \monitor\Route($args['r']);

$route->dispatch();