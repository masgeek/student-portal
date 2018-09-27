<?php
$root_dir = dirname(dirname(__FILE__));

require_once $root_dir . '/vendor/autoload.php';

$postData = $_POST;
// Tell log4php to use our configuration file.
Logger::configure($root_dir . '/config/config.xml');

$callbackParams = serialize($postData);

// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('myLogger');

// Start logging
$log->info($postData);
