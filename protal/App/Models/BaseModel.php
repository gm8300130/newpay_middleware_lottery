<?php
namespace APP\Models;
use \Illuminate\Database\Eloquent\Model ;

/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/30
 * Time: 15:46
 */
class BaseModel extends Model
{
    private $db;
    public function __contrust(ContainerInterface &$container){
        $this->db = $container->get('db');
    }
}