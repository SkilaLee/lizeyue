<?php 
	header("content-type:text/html;charset=utf8");
	//定义css,js,img常量,方便后期维护
	define("SITE_URL","http://localhost");


	define("CSS_URL",SITE_URL."/test/pre/test/public/Home/css");
	define("JS_URL",SITE_URL."/test/pre/test/public/Home/js");
	define("IMG_URL",SITE_URL."/test/pre/test/public/Home/img");

	//后台的配置
	define("ADMIN_CSS_URL",SITE_URL."/test/pre/test/public/Admin/css");
	define("ADMIN_IMG_URL",SITE_URL."/test/pre/test/public/Admin/img");

	//view 常量
	define("VIEW", SITE_URL."/test/pre/test/index.php/Home/User/");
	define("MANAGER", SITE_URL."/test/pre/test/index.php/Home/Manager/");
	define("CONTENT", SITE_URL."/test/pre/test/index.php/Home/Content/");
	//把目前tp模式由生成模式变为开发模式
	define ("APP_DEBUG",true);
	//引入框架的核心程序
	require "../ThinkPHP/ThinkPHP.php";
 ?>