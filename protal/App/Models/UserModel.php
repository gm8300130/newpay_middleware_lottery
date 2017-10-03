<?php
namespace APP\Models;

/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/30
 * Time: 15:46
 */
class UserModel extends BaseModel
{
    public $UserId = '123';

    public function __contrust(){
        $list = $this->db->table('updaterecords')->get();
    }
}