<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends Controller {
	function content(){

	$id=I('get.id','','htmlspecialchars');
	$Model = M('Content');
	$list = $Model->query("SELECT * FROM `content` WHERE `content_id` = '$id'");
    $this->assign('list',$list);
    $this->display();
	}

}