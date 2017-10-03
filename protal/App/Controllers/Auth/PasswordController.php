<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use Respect\Validation\Validator as v;

class PasswordController extends BaseController 
{

	public function getChangePassword() {
		return $this->render('auth.password.change');
	}

	public function postChangePassword() {

		$validation = $this->validator->validate($this->request,
			[
				'password_old' => v::notEmpty()
					->noWhitespace()
					->matchesPassword($this->auth->user()->password),
				'password'=> v::notEmpty()->noWhitespace()
			]
		);

		if ($validation->failed()) {
			return $this->redirect('auth.password.change');
		}

		$this->auth->user()->setPassword($this->request->getParam('password'));
		return $this->redirect('home');
	}
}