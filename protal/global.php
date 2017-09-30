<?php
/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/29
 * Time: 11:36
 */

define('BASE_ROOT_PATH',str_replace('\\','/',dirname(__FILE__)));
define('APP_PATH',BASE_ROOT_PATH.'/App');
define('CONFIG_PATH',APP_PATH.'/Config');
define('CONTROLLER_PATH',APP_PATH.'/Controllers');
define('MODEL_PATH',APP_PATH.'/Models');

define('LOG_PATH',BASE_ROOT_PATH.'/Logs');
define('PUBLIC_PATH',BASE_ROOT_PATH.'/Public');
define('SRC_PATH',BASE_ROOT_PATH.'/Src');
define('ROUTER_PATH',APP_PATH.'/Routers');
define('PROVIDERS_PATH', APP_PATH . '/Providers');
