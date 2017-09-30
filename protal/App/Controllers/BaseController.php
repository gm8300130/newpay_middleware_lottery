<?php
namespace App\Controllers;
use Interop\Container\ContainerInterface;
/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/29
 * Time: 13:54
 */
class BaseController 
{
    protected $view;
    protected $db;
    public function __construct(ContainerInterface &$container)
    {
        $this->view = $container->get('view');
        $this->db = $container->get('db');
    }
}
