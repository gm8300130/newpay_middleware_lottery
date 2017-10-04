<?php
/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/29
 * Time: 11:36
 */

define('BASE_ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)));

define('BOOTSTARP', BASE_ROOT_PATH . '/Bootstrap');
define('APP_PATH', BASE_ROOT_PATH . '/App');
define('CONFIG_PATH', BASE_ROOT_PATH . '/Config');
define('LOG_PATH', BASE_ROOT_PATH . '/Logs');
define('PUBLIC_PATH', BASE_ROOT_PATH . '/Public');
define('RESOURCES_PATH', BASE_ROOT_PATH . '/Resources');

define('CONTROLLER_PATH', APP_PATH . '/Controllers');
define('MODEL_PATH', APP_PATH . '/Models');
define('ROUTER_PATH', APP_PATH . '/Routers');
