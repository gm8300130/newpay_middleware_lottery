<?php
$providers = glob(PROVIDERS_PATH . '/Init.*.Providers.php');

foreach ($providers as $provider) {
    require $provider;

}

