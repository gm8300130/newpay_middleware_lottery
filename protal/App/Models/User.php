<?php
namespace App\Models;

class User extends BaseModel
{
    protected $table = 'users';

    protected  $fillable = ['name','email','password'];

	public function setPassword($password) {
		$this->update([
			'password'=>password_hash($password, PASSWORD_DEFAULT)
		]);
    }
    
    public function getAll() {
        return $this->all();
    }
}