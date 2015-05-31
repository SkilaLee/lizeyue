<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo (CSS_URL); ?>/index_style.css">
	<title><?php echo ($vo["type"]); ?></title>
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
    <div class="container-fluid blog-container"><div class="row">
	<div class="col-md-9 blog-container-list">

		<!-- 文章详情 -->
			

	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="page-header">

			<h2><a href="<?php echo (MANAGER); ?>content?id=<?php echo ($vo["content_id"]); ?>"><?php echo ($vo["title"]); ?></a></h2>
		</div>
		<div class="panel" style="overflow:auto;">
			<div class="panel-body"><pre><?php echo ($vo["content"]); ?></pre></div>
			
			<div class="panel-footer">
				创建于：<?php echo (date("Y-m-d H:i:s",$vo["time"])); ?>		By Toruneko	
				<div style="float:right;">

				<a href="<?php echo (MANAGER); ?>edit?id=<?php echo ($vo["content_id"]); ?>">编辑</a>
				<a href="<?php echo (MANAGER); ?>delete?id=<?php echo ($vo["content_id"]); ?>">删除</a>评论
				<pre class="dis">
					
					<?php if(is_array($dis)): $i = 0; $__LIST__ = $dis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$di): $mod = ($i % 2 );++$i;?><p><?php echo ($di["friend_name"]); ?>说: <?php echo ($di["discuss"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
				</pre>
			</div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>

	</div>
	<div class="col-md-3 blog-container-sidebar" id="sidebar">
  
    <div class="page-header">
        <span class="glyphicon glyphicon-chevron-up sidebar-toggle" for="#category"></span>
        <h6>分类标签</h6>
    </div>
    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list-group" id="category">
	        <a href="http://blog.toruneko.net/tag/php" class="list-group-item">
		<span class="badge">6</span>
		<?php echo ($vo["type"]); ?></a>    </div><?php endforeach; endif; else: echo "" ;endif; ?>
	<!-- 文章结束 -->
		<a href="<?php echo (VIEW); ?>write">再写点什么吧~</a>
	    
</div></div></div>
	<div class="container-fluid text-center">
		&copy; 2014 - 2015		Toruneko. All rights reserved.
		Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a>.        <a href="http://sae.sina.com.cn/">
            <img title="Sae App Engine" alt="Sae App Engine" width="117" height="12" src="http://sae.sina.com.cn/doc/_images/poweredby-117x12px.gif"/>
	    </a>
    </div>
<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="http://libs.useso.com/js/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://toruneko.sinaapp.com/assets/main/blog.js"></script>
<script type="text/javascript">
</script>
</body>
</html>