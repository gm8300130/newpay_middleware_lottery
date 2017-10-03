<?php
namespace App\Middleware;

class ValidationErrorsMiddleware extends Middleware
{
	public function __invoke($request, $response, $next) {
		
		if (isset($_SESSION['errors'])) {
			$this->view()->getEnvironment()->addGlobal('errors',$_SESSION['errors']);
			unset($_SESSION['errors']);
		}

		return $next($request, $response);
	}

}