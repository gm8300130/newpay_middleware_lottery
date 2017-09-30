<?php
$routers = glob(ROUTER_PATH . '/*.Router.php');
foreach ($routers as $routerfile) {
    require $routerfile;

}
