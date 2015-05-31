<?php
namespace Home\Controller;
use Think\Controller;
//Controllerçˆ¶ç±»:ThinkPHP/Library/Think/Controller.class.php
class UserController extends Controller {
      //×¢ÏúµÇÂ½
    function cancel(){
        session_start();
        session_destroy();
        $this->display('index');
    }

}