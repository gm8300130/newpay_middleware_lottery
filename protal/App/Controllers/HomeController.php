<?php
namespace App\Controllers;
use Slim\Http\Request;
use Slim\Http\Response;
use Interop\Container\ContainerInterface;
use App\Models\UserModel;
use App\Factory\ModelsFactory;

/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/29
 * Time: 13:41
 */
class HomeController extends BaseController
{
    protected $table;

    public function __construct(ContainerInterface &$container)
    {
        parent::__construct($container);
        //$this->table = $table;
        //var_dump($user);

       $user =  ModelsFactory::getModel('UserModel');

       var_dump($user);
    }

    public function Home(Request $request, Response $response, array $args){

        //$result = $this->table->get();
        //var_dump($result);
        $list = $this->db->table('updaterecords')->get();







        return  $this->view->render($response,'index.phtml',array('name'=>'123qwe'));

    }
}
