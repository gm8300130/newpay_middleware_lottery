<?php
/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/29
 * Time: 13:41
 */
namespace App\Controllers;

use App\Database\migrations\UserMigration;
use App\Database\seeds\UserSeed;

class HomeController extends BaseController
{
    public function index() {
        $this->log->info('456');
        return $this->render('home');
    }

    public function migration(UserMigration $UserMigration) {
        $UserMigration->run();
    } 

    public function seed(UserSeed $UserSeed) {
        $UserSeed->run();
    }
}
