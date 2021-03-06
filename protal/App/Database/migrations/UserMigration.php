<?php

namespace App\Database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class UserMigration
{ 
    public function run() {
        Capsule::schema()->dropIfExists('users');
        Capsule::schema()->create('users', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }
}