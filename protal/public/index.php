<?php
require __DIR__ . '/../vendor/autoload.php';
require  __DIR__.'/../global.php';

session_start();

// Instantiate the app
$settings = require CONFIG_PATH.'/settings.php';
$app = new \Slim\App($settings);

// Register middleware
require __DIR__ . '/../middleware/middleware.php';

require  PROVIDERS_PATH . '/Init.Providers.Setting.php';

// Run app
$app->run();
