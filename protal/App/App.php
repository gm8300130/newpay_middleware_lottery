<?php 
namespace App;

use DI\Bridge\Slim\App as DIBridge;
use DI\ContainerBuilder;

class App extends DIBridge
{
	protected function configureContainer(ContainerBuilder $builder) {
		
		$builder->addDefinitions([
			'settings.determineRouteBeforeAppMiddleware' => true,
			'settings.displayErrorDetails' => true,
			'settings.addContentLengthHeader' => false,
		]);

		$builder->addDefinitions(__DIR__.'/../config/container.php');
	}
}