<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->get('/', ['App\Controllers\HomeController', 'index'])->setName('home');

// Liens qui ne sont pas accessibles pour un membre inscris, donc juste pour les visiteurs
$app->group('', function () {
	$this->get('/auth/signup', ['App\Controllers\Auth\AuthController', 'getSignUp'])->setName('auth.signup');
	$this->post('/auth/signup', ['App\Controllers\Auth\AuthController', 'postSignUp']);

	$this->get('/auth/signin', ['App\Controllers\Auth\AuthController', 'getSignIn'])->setName('auth.signin');
	$this->post('/auth/signin', ['App\Controllers\Auth\AuthController', 'postSignIn']);
})->add(new GuestMiddleware($container));

//Protection des liens pour tous les utilisations qui sont connectes
$app->group('', function () {

	$this->get('/auth/logout',['App\Controllers\Auth\AuthController', 'getLogOut'])->setName('auth.logout');
	$this->get('/auth/password/change', ['App\Controllers\Auth\PasswordController', 'getChangePassword'])->setName('auth.password.change');
	$this->post('/auth/password/change',['App\Controllers\Auth\PasswordController', 'postChangePassword']);
})->add(new AuthMiddleware($container));


// Migration 
$app->get('/migration', ['App\Controllers\HomeController', 'migration'])->setName('migration');

//Seed
$app->get('/seeds', ['App\Controllers\HomeController', 'seed'])->setName('seed');