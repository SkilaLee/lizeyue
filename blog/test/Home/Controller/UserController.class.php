<?php
namespace Home\Controller;
use Think\Controller;
//Controller父类:ThinkPHP/Library/Think/Controller.class.php
class UserController extends Controller {
      //ע����½
    function cancel(){
        session_start();
        session_destroy();
        $this->display('index');
    }

}