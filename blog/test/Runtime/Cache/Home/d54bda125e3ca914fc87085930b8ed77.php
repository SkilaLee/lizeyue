<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo (CSS_URL); ?>/index_style.css">
	<title>剑阁-Toruneko</title>
    <link rel="shortcut icon" href="http://toruneko.sinaapp.com/favicon.ico" type="image/x-icon"/>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="http://toruneko.sinaapp.com/assets/js/html5shiv.min.js"></script>
	<script type="text/javascript" src="http://toruneko.sinaapp.com/assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Toruneko</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li><a href="http://www.toruneko.net">Home</a></li>
					<li><a href="http://blog.toruneko.net">Blog</a></li>
					<li><a href="http://blog.toruneko.net/19">Public Api</a></li>
					<li><a href="https://github.com/toruneko/redlib" target="_blank">RedLib</a></li>
                    <li><a href="http://123.57.74.156:88" target="_blank">DNA SE</a></li>
					<li><a href="http://blog.toruneko.net/rss">RSS</a></li>
				</ul>
				<ul class="nav navbar-nav" id="login">
					<li><a href="<?php echo (MANAGER); ?>index">
							<?php if(is_array($name)): $i = 0; $__LIST__ = $name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$name): $mod = ($i % 2 );++$i; echo ($name); endforeach; endif; else: echo "" ;endif; ?> 你好!</a></li>
					<li><a href="<?php echo (VIEW); ?>cancel">注销登陆</a></li>
				</ul>
				<form action="http://blog.toruneko.net/search" class="navbar-form navbar-right" role="search">
					<div class="form-group">
						<input type="text" name="kw" class="form-control" placeholder="关键字" />
					</div>
					<button type="submit" class="btn btn-default">搜索</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="body">
	<div class="write">
		<h4 class="label label-info">写点什么吧~</h4>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form action="<?php echo (MANAGER); ?>write?id=<?php echo ($vo["content_id"]); ?>" method = "post">
			<input type="text" name="title" placeholder="标题"/ value="<?php echo ($vo["title"]); ?>"><br>
			<input type="text" name="type" placeholder="分类标签" value="<?php echo ($vo["type"]); ?>"/><br>
			<textarea  name = "text" class="form-control" rows="29" placeholder="正文" style="width: 100%;"><?php echo ($vo["content"]); ?></textarea>
			<button type="submit" class="btn btn-primary">提交</button>
		</form><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>




	<div class="container-fluid text-center">
		&copy; 2014 - 2015		Toruneko. All rights reserved.
		Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a>.        <a href="http://sae.sina.com.cn/">
            <img title="Sae App Engine" alt="Sae App Engine" width="117" height="12" src="http://sae.sina.com.cn/doc/_images/poweredby-117x12px.gif"/>
	    </a>
    </div>

</body>
</html>