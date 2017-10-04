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
use App\Models\User;

class HomeController extends BaseController
{
    public function index(User $u) {
        $this->log->info('456');
        var_dump($u->all()->toArray());
        return $this->render('home');
    }

    public function getPost() {
        dump($this->request);
        dump($this->request->getQueryParams());
         dump($this->request->getMethod());
        //dump($request->isPost());
    }

    public function migration(UserMigration $UserMigration) {
        $UserMigration->run();
    } 

    public function seed(UserSeed $UserSeed) {
        $UserSeed->run();
    }

}
