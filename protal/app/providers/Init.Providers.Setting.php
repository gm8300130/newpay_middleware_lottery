<?php
$providers = glob(PROVIDERS_PATH . '/*.Providers.php');

foreach ($providers as $provider) {
    require $provider;
}
