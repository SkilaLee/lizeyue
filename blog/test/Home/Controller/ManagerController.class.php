<?php
namespace Home\Controller;
use Think\Controller;
class ManagerController extends Controller {


    //登录
    public function login(){
    	//display('hello'); Admin/View/Manager/hello.html
    	// $index = new \Model\ContentModel();
     //    $info=$index->select();
      
        $username=I('post.username','','htmlspecialchars');
        $psw=md5(md5(I('post.password','','htmlspecialchars').'lzy'));
        $Model = M('User');

        //确定用户名的唯一
        $result = $Model->query("SELECT * FROM `User` WHERE `name` = '".mysql_real_escape_string($username)."' and `psw` = '". mysql_real_escape_string($psw)."'");

        if ($result) {
            
            session_start();
            $_SESSION["name"]=$username;
            $this->assign('name',$username);
        $Discuss = M('Discuss');
            //传递变量
            $list = $Model->query("SELECT * FROM `content` WHERE `name` = '$username'");
            //var_dump($list);
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('list',$list);
            $info = $Model->query("SELECT DISTINCT type FROM content WHERE `name` = '$username'");
            $this->assign('info',$info);      
            $this->assign('name',$username);
            $dis = $Discuss->query("SELECT * FROM `discuss` WHERE `content_id` = '$id'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('dis',$dis);
            // var_dump($username);
            // var_dump($info);

            $this->display('index');
    }
        else{
            echo "密码或用户名错误!";
            echo "<a href='http://localhost/test/pre/test/index.php/Home/User/login'>返回登录页面</a>";
        }
        //var_dump(get_defined_constants(true));
        //$this->display('index');
    }
  

    //注册
    function register() {
        $username=I('post.username','','htmlspecialchars');
        $psw=md5(md5(I('post.password','','htmlspecialchars').'lzy'));
        $Model = M('User');
        //确定用户名的唯一
        $result = $Model->query("SELECT * FROM `User` WHERE `name` = '$username'");
      
        //$name=$User->where('username= 333')->select(); 
        if (!$result) {
            
        $data['name'] = $username;
        $data['psw'] = $psw;
        $count=$Model->data($data)->add();
        if ($count) {
            session_start();
            $_SESSION["name"]=$username;
            $this->assign('name',$username);
            //传递变量
        $Discuss = M('Discuss');
            $list = $Model->query("SELECT * FROM `content` WHERE `name` = '$username'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('list',$list);
            $info = $Model->query("SELECT DISTINCT type FROM content WHERE `name` = '$username'");
            $this->assign('info',$info);
            $this->assign('name',$username);
            $dis = $Discuss->query("SELECT * FROM `discuss` WHERE `content_id` = '$id'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('dis',$dis);
            var_dump($username);
            var_dump($info);

            //$this->display('index');
        }
    }
        else{
            echo "注册失败!<br>该用户名已被注册!<br>";
            echo "<a href='http://localhost/test/pre/test/index.php/Home/User/register'>返回注册页面</a>";
        }
        //var_dump(get_defined_constants(true));
        //$this->display('index');
    }


    //添加文章
    public function write(){
        session_start();
        $username=  $_SESSION['name'];
        $title=I('post.title','','htmlspecialchars');
        $type=I('post.type','','htmlspecialchars');
        $text=I('post.text','','htmlspecialchars');


        $Discuss = M('Discuss');
        $Model = M('Content');
        $time=date("Y-m-d H:i:s",time());
        $data['name'] = $username;
        $data['title'] = $title;
        $data['type'] = $type;
        $data['content'] = $text;
        $data['time'] = $time;
        $id=I('get.id','','htmlspecialchars');
        //var_dump($id);
        if ($id) {
                $count=$Model->where("content_id='$id'")->delete();
                $data['content_id'] = $id;
        }
        $count=$Model->data($data)->add();
       // var_dump($count);
        if ($count) {
            $list = $Model->query("SELECT * FROM `content` WHERE `name` = '$username'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('list',$list);
            $info = $Model->query("SELECT DISTINCT type FROM content WHERE `name` = '$username'");
            $this->assign('info',$info);
            $this->assign('name',$username);
            $dis = $Discuss->query("SELECT * FROM `discuss` WHERE `content_id` = '$id'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('dis',$dis);
            $this->display('index');
        }else{
            echo "保存失败!";
        }
    

    }

    //查看全文
    function content(){
    session_start();
    $username=  $_SESSION['name'];
         $Discuss = M('Discuss');
   $id=I('get.id','','htmlspecialchars');
    $Model = M('Content');
    $list = $Model->query("SELECT * FROM `content` WHERE `content_id` = '$id'");
    $this->assign('list',$list);
    $this->assign('name',$username);
    $dis = $Discuss->query("SELECT * FROM `discuss` WHERE `content_id` = '$id'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('dis',$dis);
   $this->display();
    }


    //各标签内的文章
    function type(){
        session_start();
         $Discuss = M('Discuss');
       $username=  $_SESSION['name'];
        $type=I('get.type','','htmlspecialchars');
        $Model = M('Content');
        $list = $Model->query("SELECT * FROM `content` WHERE `type` = '$type'");
        $this->assign('list',$list);
        $this->assign('name',$username);
        $dis = $Discuss->query("SELECT * FROM `discuss` WHERE `content_id` = '$id'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('dis',$dis);
        $this->display();
    }


    //编辑文章
    function edit(){
    session_start();
    $username=  $_SESSION['name'];
        $Discuss = M('Discuss');
    $id=I('get.id','','htmlspecialchars');
    $Model = M('Content');
    $list = $Model->query("SELECT * FROM `content` WHERE `content_id` = '$id'");
   
    $this->assign('list',$list);
    $user="lee";
    $this->assign('name',$user);
    $dis = $Discuss->query("SELECT * FROM `discuss` WHERE `content_id` = '$id'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('dis',$dis);
    $this->display();
    }


    //删除文章

    function delete(){

        session_start();
        $username=  $_SESSION['name'];

         $Discuss = M('Discuss');
       $id=I('get.id','','htmlspecialchars');
        $Model = M('Content');
        $count=$Model->where("content_id='$id'")->delete();
        //var_dump($count);
        $Discuss = M('Discuss');
        $count=$Discuss->where("content_id='$id'")->delete();        

        $list = $Model->query("SELECT * FROM `content` WHERE `name` = '$username'");
        $this->assign('empty','<span class="empty">没有数据</span>');
        $this->assign('list',$list);
        $info = $Model->query("SELECT DISTINCT type FROM content WHERE `name` = '$username'");
        $this->assign('empty','<span class="empty">没有数据</span>');
        $this->assign('info',$info);
        $this->assign('name',$username);
        $dis = $Discuss->query("SELECT * FROM `discuss` WHERE `content_id` = '$id'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('dis',$dis);
        $this->display('type');
    }



    //评论
    function discuss(){
        $Discuss = M('Discuss');
        //写入评论
        session_start();
        $username=  $_SESSION['name'];
        $id=I('get.id','','htmlspecialchars');
        $friend_name=I('post.username','','htmlspecialchars');
        $email=I('post.email','','htmlspecialchars');
        $text=I('post.content','','htmlspecialchars');
        $time=date("Y-m-d H:i:s",time());

        $data['user_name'] = $username;
        $data['friend_name'] = $friend_name;
        $data['friend_mail'] = $email;
        $data['content_id'] = $id;
        $data['discuss'] = $text;
        $data['time'] = $time;

        $count=$Discuss->data($data)->add();
           
            $dis = $Discuss->query("SELECT * FROM `discuss` WHERE `content_id` = '$id'");
            $this->assign('empty','<span class="empty">没有数据</span>');
            $this->assign('dis',$dis);
            $Model=M('content');

            $Model=M('content');
            $list = $Model->query("SELECT * FROM `content` WHERE `name` = '$username'");
        $this->assign('empty','<span class="empty">没有数据</span>');
        $this->assign('list',$list);
        $info = $Model->query("SELECT DISTINCT type FROM content WHERE `name` = '$username'");
        $this->assign('empty','<span class="empty">没有数据</span>');
        $this->assign('info',$info);
            $this->display('index');
        
    }
}