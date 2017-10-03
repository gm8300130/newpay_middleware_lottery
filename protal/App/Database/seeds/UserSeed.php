<?php

namespace App\Database\seeds;

use Illuminate\Database\Capsule\Manager as Capsule;

class UserSeed 
{
    public function run() {

        Capsule::table('users')->insert(array(
            array(
                'name' => 'Hello',
                'email' => 'Hello@ao.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT)
            ),
            array(
                'name' => 'Carlos',
                'email' => 'Carlos@ao.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT)
            ),
            array(
                'name' => 'Overtrue',
                'email' => 'Carlos@ao.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT)
            ),
        ));
    }
}