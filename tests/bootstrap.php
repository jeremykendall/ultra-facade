<?php

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
date_default_timezone_set('America/Chicago');

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->add('JeremyKendall\\UltraFacade\\Tests', __DIR__ . '/tests');

define('SLIM_MODE', 'testing');
