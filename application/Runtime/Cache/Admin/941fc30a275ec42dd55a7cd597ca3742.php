<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>后台管理系统</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Psd1704/11ThinkPHP/ttnews/public/css/admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Psd1704/11ThinkPHP/ttnews/library/jquery/jquery-1.4.js"></script>
    <script type="text/javascript">
     function delType(typeId){
      if(confirm("是否要删除该分类！")){
        window.location = "/Psd1704/11ThinkPHP/ttnews/admin.php/ModType/delete/typeId/"+typeId;
      }
     }
     function showText(typeId){
      window.location = "/Psd1704/11ThinkPHP/ttnews/admin.php/Update/index/typeId/"+typeId;
     }
    </script>
  </head>
  <body>
    <!-- 网站的头 -->
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

      <!-- 当前位置 -->
    <div class="locationDiv">&nbsp;: 后台管理 : 修改分类</div>
    <!-- 正文内容 -->
    <div class="mainDiv clear">
      <!-- 左侧树状列表 -->
  <!-- 正文内容 -->
    <div class="mainDiv clear">
      <!-- 左侧树状列表 -->
      <div class="leftDiv"><script type=text/javascript src="/Psd1704/11ThinkPHP/ttnews/library/js/dtree.js"></script>
<script  type=text/javascript> 
  function hello()
  {
    d = new dTree('d');

    d.add(0,-1,'后台管理','');

    d.add(1,0,'重新登陆','javascript:logout()');

    d.add(2,0,'新闻管理','');
    d.add(21,2,'添加新闻','/Psd1704/11ThinkPHP/ttnews/admin.php/AddNews/index');
    d.add(22,2,'修改新闻','/Psd1704/11ThinkPHP/ttnews/admin.php/ModNews/index');

    d.add(3,0,'分类管理','');
    d.add(31,3,'添加分类','/Psd1704/11ThinkPHP/ttnews/admin.php/AddType/index');
    d.add(32,3,'修改分类','/Psd1704/11ThinkPHP/ttnews/admin.php/ModType/index');

    d.add(4,0,'用户管理','');
    d.add(41,4,'添加用户','adduser.html');

    d.add(5,0,'返回首页','index.html');

    document.write(d);
  }

  hello();
</script></div>
      <!-- 右侧页面内容 -->
      <div class="rightDiv">
        <br><br><br><br>
        <form name="frm" method="post" action="modtype.html">
        <table border="1" align="center" width="600" cellpadding="0" cellspacing="0">
          <tr class="modTypeDiv1">
            <td>类别名称</td>
            <td>新闻数</td>
            <td>&nbsp;</td>
          </tr>
         <?php if(is_array($newsType)): $i = 0; $__LIST__ = $newsType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="modTypeDiv2" style="background-color:#FFFFFF;">
            <td id="td11" width="200"><?php echo ($v["typeName"]); ?></td>
            <td id="td12" width="200"><?php echo ($v["articleNums"]); ?></td>
            <td id="td13" width="200">
              <a href="javascript:showText(<?php echo ($v["typeId"]); ?>)">编辑</a>
              &nbsp;&nbsp;&nbsp;
              <a href="javascript:delType(<?php echo ($v["typeId"]); ?>)">删除</a>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?> 
        </table>
        </form>
      </div>
    </div>
  </body>
</html>