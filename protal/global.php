<?php
/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/29
 * Time: 11:36
 */

define('BASE_ROOT_PATH',str_replace('\\','/',dirname(__FILE__)));
define('APP_PATH',BASE_ROOT_PATH.'/app');
define('CONFIG_PATH',BASE_ROOT_PATH.'/app/config');
define('CONTROLLER_PATH',BASE_ROOT_PATH.'/app/controller');

define('LOG_PATH',BASE_ROOT_PATH.'/logs');
define('PUBLIC_PATH',BASE_ROOT_PATH.'/public');
define('SRC_PATH',BASE_ROOT_PATH.'/src');
define('ROUTER_PATH',APP_PATH.'/router');
define('PROVIDERS_PATH', APP_PATH . '/providers');
