<?php
namespace Admin\Controller;
use Think\Controller;
//Controller父类:ThinkPHP/Library/Think/Controller.class.php
class ManagerController extends Controller {

    	protected $_var = array();  
    public function login(){
    	//display()û�в���,��ô��õ�ģ�������뵱ǰ��������һ��
    	//display('hello'); Admin/View/Manager/hello.html
    	$index = new \Model\UserModel();
    	//var_dump($index);
    	$this->_var[$name] = $value; 
    	include $tplfile;  
    	$info = $index->select();    //���������Ϣ
    	var_dump($info);

    	$setting = array();  
		if (!empty($info)) {  
		    foreach ($info as $value){  
		        $setting[$value['key']] = $value['value'];  
		    }  
    	var_dump($setting);
		}  
		$this->assign('setting', $setting);
    	// foreach ($info as $key => $value) {
    	// 	echo $value['user_id'];
    	// }
    	$this->display();
    }
    public function register() {
    	echo "registering";
    }
}