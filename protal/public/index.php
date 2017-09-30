<?php
require __DIR__ . '/../vendor/autoload.php';
require  __DIR__.'/../global.php';

session_start();

// Instantiate the app
$settings = require CONFIG_PATH.'/Settings.php';
$app = new \Slim\App($settings);

// Register middleware
require SRC_PATH.'/middleware.php';

require  PROVIDERS_PATH . '/Init.Providers.Setting.php';

// Register the database connection with Eloquent
$capsule = $app->getContainer()->get('db');
$capsule->bootEloquent();


// Run app
$app->run();

