<?php

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/29
 * Time: 11:15
 */

$app->get('/', function (Request $request, Response $response, array $args) {

    $response->write('this is a index page');

});


$app->get('/hello/{name}', function ($request, $response, $args) {
    
    return $this->view->render($response, 'index.phtml', $args);
    
});


$app->get('/home', '\HomeController:Home');