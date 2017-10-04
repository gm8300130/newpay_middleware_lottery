<?php

use Dotenv\Dotenv;
use App\App;
use App\Middleware\CsrfViewMiddleware;
use App\Middleware\OldInputMiddleware;
use App\Middleware\ValidationErrorsMiddleware;
use Illuminate\Database\Capsule\Manager as Capsule;
use Noodlehaus\Config;
use Respect\Validation\Validator as v;
use Monolog\Logger;

session_start();
require BASE_ROOT_PATH . '/vendor/autoload.php';

//载入环境变数
$dotenv = new Dotenv(BASE_ROOT_PATH);
$dotenv->load();

$app = new App();
$container = $app->getContainer();
$config = new Config(CONFIG_PATH . '/database.php');
$db = $config->get('db');

// 启用 Eloquent
$capsule = new Capsule();
$capsule->addConnection($db);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$settings = new Config(CONFIG_PATH . '/logger.php');
$logger = new Monolog\Logger($settings->get('logger')['name']);
$logger->pushProcessor(new Monolog\Processor\UidProcessor());
$logger->pushHandler(
    new Monolog\Handler\StreamHandler(
        $settings->get('logger')['path'],
        $settings->get('logger')['level']
    )
);   
//$container->logger = $logger;

require APP_PATH . '/routes.php';

$app->add(new ValidationErrorsMiddleware($container));

$app->add(new OldInputMiddleware($container));

$app->add(new CsrfViewMiddleware($container));

v::with('App\\Support\\Validation\\Rules');

