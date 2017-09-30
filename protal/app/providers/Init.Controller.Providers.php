<?php
$controllers = glob(CONTROLLER_PATH . '/*Controller.php');
foreach ($controllers as $controller) {
    require $controller;

}
