<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
// Get container

$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    $tpl_path = $container->get('settings')['renderer']['template_path'];

    return new \Slim\Views\PhpRenderer($tpl_path);
};

// monolog
$container['logger'] = function ($container) {
    $settings = $container->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Service factory for the ORM
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};


$container['App\Controllers\HomeController'] = function ($c) {
   //$view = $c->get('view');
   return new App\Controllers\HomeController($c['view'], $c['router'], $c['flash']);
};
