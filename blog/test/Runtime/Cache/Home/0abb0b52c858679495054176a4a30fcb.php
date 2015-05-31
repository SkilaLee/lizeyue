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
					<li><a href="<?php echo (VIEW); ?>login">login</a></li>
					<li><a href="<?php echo (VIEW); ?>register">register</a></li>
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
	<div class="page-header">
	<h2><a href="http://blog.toruneko.net/40">DNA SE：检索结果排序算法 — TF-IDF权重计算</a></h2>
</div>
<div class="panel">
	<div class="panel-body"><pre>在完成DNA SE时，对检索结果的排序依然是延续博客（blog.toruneko.net）的算法，主要考虑了检索结果文档中关键词出现的频率与检索结果文档中包含关键词个数这两个维度，并且设定了7：3的权重比。但是在运用到DNA文档上时，就显得不太合理了。假如检索一段包含Poly(A)片段的序列，而DNA文档绝大部分是包含Poly(A)的，这样会给那些无关紧要的文档增加了权重。所以改用TF-IDF算法。</pre>

	</div>
	<div class="panel-footer">
		<span>这里还没有足迹</span>

		创建于：2015-04-19		By Toruneko	</div>
</div>

	</div>
	<div class="col-md-3 blog-container-sidebar" id="sidebar">
  
    <div class="page-header">
        <span class="glyphicon glyphicon-chevron-up sidebar-toggle" for="#category"></span>
        <h6>分类标签</h6>
    </div>
    <div class="list-group" id="category">
        <a href="http://blog.toruneko.net/tag/php" class="list-group-item">
	<span class="badge">6</span>
	PHP</a>    </div>
    
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