<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
  <head>
    <title>天天新闻网</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Psd1704/11ThinkPHP/ttnews/public/css/news.css" type="text/css" rel="stylesheet" />
    <script src="/Psd1704/11ThinkPHP/ttnews/library/jquery/jquery-1.4.js"></script>
    <script>
    	function checkLogin(){
    		if(document.frm.userName.value ==""){
    			alert("用户名不能为空!");
    			document.frm.userName.focus();
    			return false;
    		}else if(document.frm.password.value ==""){
    			alert("密码不能为空!");
    			document.frm.password.focus();
    			return false;
    		}else if(document.frm.checkCode.value==""){
    			alert("验证码不能为空!");
    			document.frm.checkCode.focus();
    			return false;
    		}
    	}
    	$(function(){
    		$('#myImg').click(function(){
    		$(this).attr("src","/Psd1704/11ThinkPHP/ttnews/index.php/Login/image/rnd/"+(new Date().getTime()));
    		});
    	})
    	
    </script>
  </head>
  <body>
    <!-- 网站头 -->
    <div class="headDiv">
      <div class="headDiv1">
        <div class="headDiv10">www.<b>ttnewS</b>.com</div>
        <div class="headDiv11"><img src="/Psd1704/11ThinkPHP/ttnews/public/images/banner17.gif" width="370" height="50"></div>
      </div>
      <div class="headDiv2">天天新闻网</div>
    </div>
	<!-- 导航菜单 -->
	<div class="menuDiv">
	  <a href="/Psd1704/11ThinkPHP/ttnews/index.php/Index/index.html" class="a">首页</a> | 
	  <?php if(is_array($newstypes)): $i = 0; $__LIST__ = $newstypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/Psd1704/11ThinkPHP/ttnews/index.php/NewsType/index/typeId/<?php echo ($v["typeId"]); ?>" class="a"><?php echo ($v["typeName"]); ?></a> |<?php endforeach; endif; else: echo "" ;endif; ?>
	  <a href="/Psd1704/11ThinkPHP/ttnews/index.php/Search/index.html" class="a">搜索</a>
	</div>
	
	<!-- 正文内容 -->
	<div class="mainDiv clear">
	  <!-- 左侧 -->
	  <div class="leftDiv">
	    <!-- 登陆 -->
	    <div class="loginDiv">
	    <form action="/Psd1704/11ThinkPHP/ttnews/index.php/Login/login" method="post" name="frm" onsubmit="return checkLogin()">
	      <div class="loginDiv1">会员登陆</div>
	      <div class="loginDiv2 clear">
	        <div class="loginDiv20">用户名</div>
	        <div class="loginDiv21"><input type="text" name="userName" value="admin" class="txt1">*</div>
	      </div>
	      <div class="loginDiv2 clear">
	        <div class="loginDiv20">密码</div>
	        <div class="loginDiv21"><input type="password" name="password" value="123" class="txt1">*</div>
	      </div>
	      <div class="loginDiv2 clear">
	        <div class="loginDiv20">验证码</div>
	        <div class="loginDiv21"><input type="text" name="checkCode" size="8" maxlength="4"><img id="myImg" src="/Psd1704/11ThinkPHP/ttnews/index.php/Login/image" align="absmiddle"width="65px"height="20px"alt="换一换" title="换一换"></div>
	      </div>
	      <div class="loginDiv2 clear">
	        <div class="loginDiv20">&nbsp;</div>
	        <div class="loginDiv21"><input type="submit" value="登陆"></div>
	        </form>
	      </div>
	    </div>
	    <!-- 一个分类带两条新闻 -->
		<?php if(is_array($newstypes)): $i = 0; $__LIST__ = $newstypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="twoNews">
	      <div class="twoNews1">&nbsp;<a href="/Psd1704/11ThinkPHP/ttnews/index.php/NewsType/index/typeId/<?php echo ($v["typeId"]); ?>" class="a"><?php echo ($v["typeName"]); ?></a></div>
	      <div class="twoNews2"><a href="/Psd1704/11ThinkPHP/ttnews/index.php/NewsType/index/typeId/<?php echo ($v["typeId"]); ?>" class="a">更多</a>&nbsp;</div>
	    </div>
	    <?php if(is_array($v["news"])): $i = 0; $__LIST__ = $v["news"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><div class="twoNews3"><img src="/Psd1704/11ThinkPHP/ttnews/public/images/makealltop.gif"><a href="/Psd1704/11ThinkPHP/ttnews/index.php/News/index/articleId/<?php echo ($vv["articleId"]); ?>"><?php echo (truncate($vv["title"])); ?></a></div><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
	  
	  </div>
	  <!-- 右侧 -->
	  <div class="rightDiv">
	    <!-- 热点要闻 -->
	    <div class="hotNews">热点要闻</div>
	    <?php if(is_array($hotNews)): $i = 0; $__LIST__ = $hotNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="hotNews1">
	      [<a href="/Psd1704/11ThinkPHP/ttnews/index.php/NewsType/index/typeId/<?php echo ($v["typeId"]); ?>"><?php echo ($v["typeName"]); ?></a>] <a href="/Psd1704/11ThinkPHP/ttnews/index.php/News/index/articleId/<?php echo ($v["articleId"]); ?>"><?php echo (truncate($v["title"])); ?></a> <?php echo ($v["dateandtime"]); ?> <img src="/Psd1704/11ThinkPHP/ttnews/public/images/new1.gif">
	    </div><?php endforeach; endif; else: echo "" ;endif; ?>
	    
	    <!-- 新闻分类导航 -->
	    <div class="hotNews">新闻分类导航</div>
	    <div class="newsDh">
	      <div class="newsDh1"><span class="newsCount">新闻总数：</span></div>
	      <div class="newsDh2"><?php echo ($count); ?></div>
	      <div class="newsDh3">&nbsp;</div>
	    </div>
	    <?php if(is_array($newstypes)): $i = 0; $__LIST__ = $newstypes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="newsDh">
	      <div class="newsDh1"><a href="/Psd1704/11ThinkPHP/ttnews/index.php/NewsType/index/typeId/<?php echo ($typeId); ?>.html"><?php echo ($v["typeName"]); ?>：</a></div>
	      <div class="newsDh2"><?php echo ($v["articleNums"]); ?></div>
	      <div class="newsDh3"><a href="/Psd1704/11ThinkPHP/ttnews/index.php/NewsType/index/typeId/<?php echo ($typeId); ?>.html"><img src="/Psd1704/11ThinkPHP/ttnews/public/images/sch.gif" border="0" class="goImg"></a></div>
	    </div><?php endforeach; endif; else: echo "" ;endif; ?>
	  </div>
	</div>
    
    
    <!-- 网页脚 -->
     <div class="footDiv">
      网站简介 - 广告服务 - 网站地图 - 帮助信息 - 联系方式<br>
      Copyrights &copy; 2014 hys.com All Rights Reserved
 </div>
  </body>
</html>