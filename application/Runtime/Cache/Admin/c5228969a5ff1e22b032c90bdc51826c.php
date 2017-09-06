<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统提示信息</title>
	<link href="/Psd1704/11ThinkPHP/ttnews/public/css/admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Psd1704/11ThinkPHP/ttnews/library/jquery/jquery-1.4.js"></script>
	<script>
	var index=5;
	function changeTime(){
		document.getElementById("timeSpan").innerHTML = index;
		index--;
		if(index < 0 ){
			window.location = "<?php echo ($jumpUrl); ?>";
		}else{
			window.setTimeout("changeTime()",1000);
		}

	}
	</script>
	<style>
		.box{
			width:900px;
			height:800px;
			font-size:13px;
			background-color: white;
			margin:0 auto;
		}
	</style>
</head>
<body onload="changeTime()">
	  <!-- 网站的头 -->
    <script type="text/javascript">
  $(document).ready(function(){
	  $("#menuDiv1,#menuDiv2,#menuDiv3,#menuDiv4,#menuDiv5").hover(function(){
		  $(this).css("background-color","#D4D0C8");
		  $(this).find("div").show();
	  },function(){
		  $(this).css("background-color","#E4E9EC");
		  $(this).find("div").hide();
	  });
  });
  //退出后台
  function logout()
  {
	  if(confirm("是否退出后台管理系统?"))
	  {
		  window.location = "index.html?act=logout";
	  }
  }
</script>
<div class="headDiv">
  <div class="headDiv1">www.ttnewS.com</div>
  <div class="headDiv2"><img src="/Psd1704/11ThinkPHP/ttnews/public/images/image6.gif"></div>
</div>
<div class="headDiv3">&nbsp;</div>
<!-- 导航菜单 -->
<div class="menuDiv">
  <div id="menuDiv1"><a href="#" onclick="logout()">重新登陆</a></div>
  <div id="menuDiv2"><a href="#">新闻管理</a><br>
    <div>
      <a href="/Psd1704/11ThinkPHP/ttnews/admin.php/AddNews/index">添加新闻</a><br>
      <a href="/Psd1704/11ThinkPHP/ttnews/admin.php/ModNews/index">修改新闻</a>
    </div>
  </div>
  <div id="menuDiv3"><a href="#">分类管理</a><br>
    <div>
      <a href="/Psd1704/11ThinkPHP/ttnews/admin.php/AddType/index">添加分类</a><br>
      <a href="/Psd1704/11ThinkPHP/ttnews/admin.php/ModType/index">修改分类</a>
    </div>
  </div>
  <div id="menuDiv4"><a href="#">用户管理</a><br>
    <div>
      <a href="adduser.html">添加用户</a>
    </div>
  </div>
  <div id="menuDiv5"><a href="index.html">返回首页</a></div>
</div> 

	<div class="box">
		<table border="1" align="center" width="600px" >
		<tr ><td><b>系统提示信息</b></td></tr>
		<tr>
			<td align="center">
				<br><?php echo ($message); ?>页面将在<span id="timeSpan">5</span>秒内自动跳转! <br><br>
				如果没有自动跳转，<a href="<?php echo ($jumpUrl); ?>">请点击这里</a>。<br><br>
			</td>
		</tr>
	</table>
	</div>
</body>
</html>