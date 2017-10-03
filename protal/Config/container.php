<?php

use App\Support\Auth\Auth;
use App\Support\Validation\Contracts\ValidatorInterface;
use App\Support\Validation\Validator;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Csrf\Guard;
use Slim\Flash\Messages;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Interfaces\RouterInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Monolog\Logger as Log;
//use Psr\Log\LoggerInterface;
use Noodlehaus\Config;

return [
    RouterInterface::class  => function (ContainerInterface $c) {
        return $c->get('router');
    },
    Twig::class => function(ContainerInterface $c) {
        $twig = new Twig(__DIR__ . '/../resources/views', ['cache' => false,]);
        $twig->addExtension(new TwigExtension($c->get('router'), $c->get('request')->getUri()));
        $twig->getEnvironment()->addGlobal('flash', $c->get(Messages::class));
        $twig->getEnvironment()->addGlobal('auth',
            [
                'check' => $c->get(Auth::class)->check(),
                'user' => $c->get(Auth::class)->user(),
            ]
        );
        return $twig;
    },
    ResponseInterface::class => function (ContainerInterface $c) {
        $headers = new Headers(['Content-Type' => 'text/html; charset=UTF-8']);
        $response = new Response(200, $headers);
        return $response->withProtocolVersion($c->get('settings')['httpVersion']);

    }, 
    ServerRequestInterface::class => function (ContainerInterface $c) {
        return Request::createFromEnvironment($c->get('environment'));
    },
    ValidatorInterface::class => function (ContainerInterface $c) {
        return new Validator();
    },
    Auth::class => function (ContainerInterface $c) {
        return new Auth();
    },
    Guard::class => function (ContainerInterface $c) {
        return new Guard();
    },
    Messages::class => function (ContainerInterface $c) {
        return new Messages();
    },
    Log::class => function (ContainerInterface $c) {    
        $settings = new Config(__DIR__ . '/../config/logger.php');
        $logger = new Monolog\Logger($settings->get('logger')['name']);
        $logger->pushProcessor(new Monolog\Processor\UidProcessor());
        $logger->pushHandler(new Monolog\Handler\StreamHandler($settings->get('logger')['path'], $settings->get('logger')['level']));   
        
        return $logger;     
    }
];
