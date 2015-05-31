<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="baidu-site-verification" content="gMSvLHvnWi" />
    <meta name="keywords" content="Toruneko,特鲁尼克,戴建豪,PHP,Java,设计模式,Windows Phone,C#" />
    <meta name="description" content="在完成DNA SE时，对检索结果的排序依然是延续博客（blog.toruneko.net）的算法，主要考虑了检索结果文档中关键词出现的频率与检索结果文档中包含关键词个数这两个维度，并且设定了7：3的权重比。但是在运用到DNA文档上时，就显得不太合理了。假如检索一段包含Poly(A)片段的序列，而DNA文档绝大部分是包含Poly(A)的，这样会给那些无关紧要的文档增加了权重。所以改用TF-IDF算法。" />
	<link rel="stylesheet" type="text/css" href="http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>/index_style.css">
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>/login_style.css">
<title>DNA SE：检索结果排序算法 — TF-IDF权重计算 | 剑阁-Toruneko</title>
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
    <div class="col-md-12 blog-container-breadcrumbs">
        <ol class="breadcrumb">
<li><a href="http://blog.toruneko.net/index/index">Home</a></li><li><a href="http://blog.toruneko.net/index">Blog</a></li><li><a href="http://blog.toruneko.net/tag/search">搜索</a></li><li class="active">DNA SE：检索结果排序算法 — TF-IDF权重计算</li></ol>    </div>
    <div class="col-md-9 blog-container-content">
        <div class="page-header"><span><a href="#comment" class="btn btn-default">留下足迹</a></span><h2>DNA SE：检索结果排序算法 — TF-IDF权重计算</h2></div>
        <div class="panel">
            <div class="panel-body">
                <pre>在完成DNA SE时，对检索结果的排序依然是延续博客（blog.toruneko.net）的算法，主要考虑了检索结果文档中关键词出现的频率与检索结果文档中包含关键词个数这两个维度，并且设定了7：3的权重比。但是在运用到DNA文档上时，就显得不太合理了。假如检索一段包含Poly(A)片段的序列，而DNA文档绝大部分是包含Poly(A)的，这样会给那些无关紧要的文档增加了权重。所以改用TF-IDF算法。</pre>
                <p>
	<span style="line-height:1.5;">&nbsp;&nbsp;&nbsp;&nbsp;在讲述TF-IDF之前，有必要先了解一下TF和DF这两个概念，TF（Term Frequency，词频）表示关键词在文档中出现的频率；DF（Document Frequency，文档频率</span><span style="line-height:1.5;">）表示包含某个关键词的文档频率。不难看出，</span><span style="line-height:1.5;">当TF越大，就说明这个关键词与文档的关联越紧密，当DF越大，就说明这个关键词与文档关联越松散。比如“的”，即使在某文档中出现频率非常高，但它也在多数文档中都出现了，所以在排序中应该弱化“的”对最终权值的贡献。</span> 
</p>
<p>
	<span>&nbsp; &nbsp; IDF（Inverse Document Frequency，逆文档频率）是从DF衍生而出的，即1/DF，在计算时通常取对数log(1/DF)。因此TF-IDF权值就可以以TF * IDF直接计算得到。对于多个关键词，则求和每个关键词的TF-IDF即为最终的权值。<br />
</span> 
</p>
<p>
	<span>&nbsp; &nbsp; 例如：检索“我的中国心”，分词结果为“我”，“的”，“中国心”。分别在文档（200词）中出现10，20，5次，而包含有“我”，“的”，“中国心”的文档分别在文档总量为1000的文档库中出现了100，1000，5篇。因此TF-IDF(我)=10/200 * log(1000/100) = 0.05；TF-IDF(的)=20 / 200 * log(1000/100) = 0；TF-IDF(中国心)=5/200 * log(1000/5) = 0.058。<br />
</span> 
</p>
<p>
	<span>所以“我的中国心”与文档的相关性是0.05+0+0.058 = 0.108。</span> 
</p>
<p>
	<span>&nbsp; &nbsp; 于是很自然的就出现了第一个问题：怎么计算文档总量？第一直觉就是count一下，大多数人都这样想，对于不同的规模和需求都有不同的处理吧，假如我们有几十个爬虫在辛勤的从互联网上给我们搬来文档，count操作就显得非常无力了。</span> 
</p>
<p>
	<span>&nbsp;&nbsp;&nbsp;&nbsp;细思极恐，延绵不绝的代码长河突然在指尖断流，仿佛时间就在此刻静止了，只有昏暗的房间里滴答的时钟才证明了思绪并未停止。不知过了多久，愈来愈浓的乌云带来了呼啸的狂风拍打着窗户，打破了这个宁静的空间。或许是累了或许是被这个声音惊醒了，他开始从抽屉里掏出了那只用了四年之久的签字笔，试图在纸上整理思路。然而，似乎是找了魔一样，不停的写着“总量”，一遍又一遍，有时候因为写的难看而发怒，有时候聚精会神的尝试写出更漂亮的“总量”。这场突如其来的困惑，让他不知所措，就在这时，窗外传来的沙沙的雨声让<span>他</span>安静了下来，“呼~终于下雨了”他自言自语道。积蓄了许久的压抑与躁动，随同这场夏雨一泻千里，就这样静静的聆听着，什么也不去想，轰的一下，又一次让他回过神来，随之而来的一道闪电映入眼帘，直达视神经，电流从树突，经历了长长的轴突，狂奔至末梢，就这样一个又接一个的在大脑中回转。啪！手掌落在了桌子上！！一场来自指尖的舞蹈继续在这昏暗的空间中演绎着，干涸的代码长河再次被注入了这灵动之美，延绵不绝。</span> 
</p>
<p>
	<span>&nbsp; &nbsp;&nbsp;<img src="http://toruneko.sinaapp.com/assets/kindeditor-4.1.10/plugins/emoticons/images/115.gif" border="0" alt="" />好了，装逼装够了，其实最后的解决方法就是，把检索出来的文档数量当作文档总量，不影响当前次检索结果的排序。<br />
</span> 
</p>
<p>
	<span>&nbsp; &nbsp; 第二个问题是DF会不会有可能为零，这个问题本身就不是一个问题，因为是通过关键词检索出来的文档，不存在DF是零。这个也是跟使用场景有关，当然如果有零的情况，那么随便加个一就好了。让零变为1，对整体影响还是很小的。<br />
</span> 
</p>
<p>
	<span>&nbsp;&nbsp;&nbsp;&nbsp;<br />
</span> 
</p>                                
            </div>
            <div class="panel-footer">
            <span class="bdsharebuttonbox">
                <a href="#" class="bds_more" data-cmd="more"></a>
                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
            </span>
                创建于：2015-04-19 By Toruneko            </div>
        </div>
        <ul class="pager">
            <li class="previous"><a href="http://blog.toruneko.net/40">&larr; 上一篇</a></li>
            <li class="next"><a href="http://blog.toruneko.net/39">下一篇 &rarr;</a></li>
        </ul>
        <div class="page-header"><h4>留下足迹</h4><a name="comment"></a></div>
        <ul class="list-group commentList" id="commentList">
            <span class="empty"></span>        </ul>
                <form class="form-horizontal" id="commentBox" action="http://blog.toruneko.net/40#comment" method="post">    <div class="form-group" id="commentReply">
        <label class="col-md-2 control-label">回复</label>
        <div class="col-md-6">
            <input class="form-control" type="text" disabled="disabled">
            <input value="0" name="ContactForm[fid]" id="ContactForm_fid" type="hidden" />        </div>
        <div class="col-md-2">
            <a class="btn btn-default cancel" href="##">取消</a>        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label required" for="ContactForm_username">昵称 <span class="required">*</span></label>        <div class="col-md-6">
            <input class="form-control" name="ContactForm[username]" id="ContactForm_username" type="text" />        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label required" for="ContactForm_email">邮箱 <span class="required">*</span></label>        <div class="col-md-6">
            <input class="form-control" name="ContactForm[email]" id="ContactForm_email" type="text" />        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label required" for="ContactForm_content">留言 <span class="required">*</span></label>        <div class="col-md-6">
            <textarea class="form-control" style="height:150px" name="ContactForm[content]" id="ContactForm_content"></textarea>        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="form-group">
                <div class="col-md-offset-1 col-md-1" style="
  margin-right: 29.333333%;
  float: right;
">
            <input class="btn btn-default" type="submit" name="yt0" value="提交" />        </div>
        <div class="col-md-2"></div>
    </div>
</form>    </div>
    <div class="col-md-3 blog-container-sidebar" id="sidebar">
    
    <div class="page-header">
        <span class="glyphicon glyphicon-chevron-up sidebar-toggle" for="#category"></span>
        <h6>分类标签</h6>
    </div>
    <div class="list-group" id="category">
        <a href="http://blog.toruneko.net/tag/php" class="list-group-item">
	<span class="badge">6</span>
	PHP</a>
    </div>
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
<script type="text/javascript" src="http://cdn.bootcss.com/prettify/r298/prettify.min.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
prettyPrint();
var offset = 75;
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"2","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];

var current = window.location.href;
$('.nav li').each(function(){
    var href = $(this).find('a').attr('href');
    if(href == current){
        $('.nav li.active').removeClass('active');
        $(this).addClass('active');
    }else if(current.match('^'+href+'.*')){
        $('.nav li.active').removeClass('active');
        $(this).addClass('active');
    }
});


var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?e259f8f91c0fa95b00c128e2cb9c9503";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();

/*]]>*/
</script>
</body>
</html>