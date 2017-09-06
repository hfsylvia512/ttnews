<?php if (!defined('THINK_PATH')) exit();?><html>
  <head>
    <title>天天新闻网</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Psd1704/11ThinkPHP/ttnews/public/css/news.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Psd1704/11ThinkPHP/ttnews/library/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
	  var editor;
	  function initEditor()
	  {
		  editor = CKEDITOR.replace("body",{
			  width:"560",
			  height:"200",
			  toolbar:"Basic",
			  skin:"v2"
		  });
		  editor.setData("");
	  }
	  function checkReview()
	  {
		  if(editor.getData() == "")
		  {
			  alert("请输入评论内容！");
			  editor.focus();
			  return false;
		  }
		  else if(document.frm.userName.value == "")
		  {
			  alert("请输入评论人的姓名！");
			  document.frm.userName.focus();
			  return false;
		  }
	  }
	  document.body.onload = initEditor;
	</script>
  </head>
  <body onload="initEditor()">
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
	  <!-- 显示的新闻 -->
	  <div class="newsTypeDiv" style="border:1px solid #990100;">
	    <div class="newsTypeDiv1">
	      &nbsp;<a href="/Psd1704/11ThinkPHP/ttnews/index.php/Index/index.html" class="a">新闻主页</a> &raquo; <?php echo ($news["typeName"]); ?>
	    </div>
	  </div>
	  <div class="newsTitle"><?php echo ($news["title"]); ?></div>
	  <div class="newsTime"><?php echo ($news["dateandtime"]); ?></div>
	  <?php if($news["imagepath"] == ''): ?><div class="newsImg"><img src="/Psd1704/11ThinkPHP/ttnews/public/newspicture/54a4e89e92e3cb6aede8a11e4630003f.jpg" width="400" height="300"></div>
	  <?php else: ?>
	  <div class="newsImg"><img src="/Psd1704/11ThinkPHP/ttnews/public/<?php echo ($news["imagepath"]); ?>" width="400" height="300"></div><?php endif; ?>
	  <div class="newsContent"><?php echo ($news["content"]); ?></div>
	  <!-- 发表评论 -->
	  <form name="frm" method="post" action="/Psd1704/11ThinkPHP/ttnews/index.php/News/reviews/articleId/<?php echo ($news["articleId"]); ?>" onsubmit="return checkReview()">
	  <div class="newsTypeDiv" style="border:1px solid #990100;">
	    <div class="newsTypeDiv1">&nbsp;&raquo; 发表评论</div>
	  </div>
	  <div class="newsContent">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em01.gif"><input type="radio" name="face" value="em01.gif" checked>
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em02.gif"><input type="radio" name="face" value="em02.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em03.gif"><input type="radio" name="face" value="em03.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em04.gif"><input type="radio" name="face" value="em04.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em05.gif"><input type="radio" name="face" value="em05.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em06.gif"><input type="radio" name="face" value="em06.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em07.gif"><input type="radio" name="face" value="em07.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em08.gif"><input type="radio" name="face" value="em08.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em09.gif"><input type="radio" name="face" value="em09.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em10.gif"><input type="radio" name="face" value="em10.gif">
	    <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em11.gif"><input type="radio" name="face" value="em11.gif">
	  </div>
	  <div class="newsImg"><textarea name="body"></textarea></div>
	  <div class="newsContent">
	    姓名：<input type="text" name="userName" size="20">
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input type="submit" value="发表">
	  </div>
	  </form>
	  <!-- 评论内容 -->
	  <div class="newsTypeDiv" style="border:1px solid #990100;">
	    <div class="newsTypeDiv1">&nbsp;&raquo; 新闻点评</div>
	  </div>

	  <div class="reviewDiv" style="background-color:#FFFBD6;">
	  <?php if(is_array($review)): $i = 0; $__LIST__ = $review;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="reviewDiv1">
	      <img src="/Psd1704/11ThinkPHP/ttnews/public/images/face/em10.gif">游客：<?php echo ($v["userName"]); ?> 于 [<?php echo ($v["dateandtime"]); ?>] 发表评论：
	    </div>
	    <div class="reviewDiv1"><?php echo ($v["body"]); ?></div>
	    <div class="reviewDiv1"><hr class="hr1"></div>
	  </div><?php endforeach; endif; else: echo "" ;endif; ?>
	  <br>
	</div>
    
    
    <!-- 网页脚 -->
   <div class="footDiv">
      网站简介 - 广告服务 - 网站地图 - 帮助信息 - 联系方式<br>
      Copyrights &copy; 2014 hys.com All Rights Reserved
 </div>
  </body>
</html>