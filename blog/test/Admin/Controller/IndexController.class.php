<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function hello() {
    	echo "后台首页!";
    }
    function test(){
    	//获得当前系统都给我们提供了什么常量可供使用(系统和自定义的)
    	//get_defined_constants([true])
    	//true参数会把常量进行自动分组显示
    	var_dump(get_defined_constants(true));
    	$this->display();
    }
}