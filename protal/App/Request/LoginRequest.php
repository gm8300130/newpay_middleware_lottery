<?php
namespace App\Request;

use Respect\Validation\Validator as v;

class LoginRequest
{
	public static function rules() {
		return [
			'email'=> v::email()->notEmpty()->notBlank(),
			'name'=> v::notBlank()->alpha(' '),
			'password'=> v::notBlank()->notEmpty(),
		];
	}

}