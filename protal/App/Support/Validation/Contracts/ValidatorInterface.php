<?php
namespace App\Support\Validation\Contracts;

use Psr\Http\Message\ServerRequestInterface as Request;

interface  ValidatorInterface
{

	public function validate(Request $request, array  $rules);
	public function failed();

}