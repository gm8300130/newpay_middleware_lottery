<?php
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Created by PhpStorm.
 * User: beck
 * Date: 2017/9/29
 * Time: 13:41
 */
class HomeController extends BaseController
{

    public function Home(Request $request, Response $response, array $args){
        //$response->write('ddddddddddd');

        //$response->render('index.html',array('name'=>'123qwe'));
        //var_dump($response);die;

        return  $this->view->render($response,'index.phtml',array('name'=>'123qwe'));

    }
}