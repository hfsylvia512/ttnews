<?php if (!defined('THINK_PATH')) exit();?><html>
  <head>
    <title>天天新闻网</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Psd1704/11ThinkPHP/ttnews/public/css/news.css" type="text/css" rel="stylesheet" />
    <script>
    	var index=5;
    	function changeTime(){
    		document.getElementById("timeSpan").innerHTML = index;
    		index--;
    		if(index < 0){
    			window.location = "<?php echo ($jumpUrl); ?>";
    		}else{
    			window.setTimeout("changeTime()",1000);
    		}
    	}
    </script>
  </head>
  <body onload="changeTime()">
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
	  <!-- 搜索条件 -->
	 
	  <div class="newsTypeDiv" style="border:1px solid #990100;">
	    <div class="newsTypeDiv1">&nbsp;系统提示信息</div>
	    <div class="newsTypeDiv2">&nbsp;</div>
	  </div>
	<table border="1" align="center" width="560px">
		<tr>
			<td align="center">
				<br><?php echo ($message); ?>页面将在<span id="timeSpan">5</span>秒内自动跳转! <br><br>
				如果没有自动跳转，<a href="<?php echo ($jumpUrl); ?>">请点击这里</a>。<br><br>
			</td>
		</tr>
	</table>
	  
	 
	</div>
    
    
    <!-- 网页脚 -->
    <div class="footDiv">
      网站简介 - 广告服务 - 网站地图 - 帮助信息 - 联系方式<br>
      Copyrights &copy; 2014 hys.com All Rights Reserved
 </div>
  </body>
</html>