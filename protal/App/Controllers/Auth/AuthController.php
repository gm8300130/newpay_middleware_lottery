<?php
namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use App\Request\LoginRequest;

class AuthController extends BaseController{
	
	public function getSignUp() {
		return $this->render('auth.signup');
	}

	public function postSignUp() {
		
		$validation = $this->validator->validate($this->request, LoginRequest::rules());
		
		if ($validation->failed()) {
			return $this->redirect('auth.signup');
		}
		
		$user = User::create(
			[
				'email'=>$this->request->getParam('email'),
				'name'=>$this->request->getParam('name'),
				'password'=>password_hash($this->request->getParam('password'), PASSWORD_DEFAULT),
			]
		);

		$this->auth->attempt($user->email, $this->request->getParam('password'));
		$this->flash->addMessage('succes', '注册成功');
		
		return $this->redirect('home');
	}

	public function getSignIn() {
		return $this->render('auth.signin');
	}

	public function postSignIn() {
		
		$auth = $this->auth->attempt(
			$this->request->getParam('email'),
			$this->request->getParam('password')
		);

		if (!$auth) {
			$this->flash->addMessage('error',"找不到账号密码");
			return $this->redirect('auth.signin');
		}

		$this->flash->addMessage('succes','登入成功');
		
		return $this->redirect('home');
	}

	public function getLogOut() {
		
		$this->auth->logout();
		$this->flash->addMessage('succes','登出成功');
		
		return $this->redirect('home');
	}
}