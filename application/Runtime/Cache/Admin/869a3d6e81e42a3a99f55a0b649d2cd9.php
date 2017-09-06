<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>后台管理系统</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Psd1704/11ThinkPHP/ttnews/public/css/admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Psd1704/11ThinkPHP/ttnews/library/jquery/jquery-1.4.js"></script>
    <script>
    function checkSearch(){
      if(document.frm.keyword.value == ""){
        alert("搜索关键字不能为空!");
        document.frm.keyword.focus();
        return false;
      }
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
      <a href="addtype.html">添加分类</a><br>
      <a href="modtype.html">修改分类</a>
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
    <div class="locationDiv">&nbsp;: 后台管理 : 管理首页</div>
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
    d.add(31,3,'添加分类','addtype.html');
    d.add(32,3,'修改分类','modtype.html');

    d.add(4,0,'用户管理','');
    d.add(41,4,'添加用户','adduser.html');

    d.add(5,0,'返回首页','index.html');

    document.write(d);
  }

  hello();
</script></div> 
      <!-- 右侧页面内容 -->
      <div class="rightDiv">
        <br>
        <form name="frm" method="get" action="/Psd1704/11ThinkPHP/ttnews/admin.php/Search/search.html" onsubmit="return checkSearch()">
       <!--  <input type="hidden" name="currentPage" value="1"> -->
        <table border="0" align="center" width="700" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left">
              &nbsp;新闻搜索：<input type="text" name="keyword" size="30" value="">
              <select name="searchType">
                <option value="title">标题</option>
                <option value="content" selected>内容</option>
              </select>
              <input type="submit" value="搜索">
            </td>
          </tr>
        </table>
        </form>
        <br>
        <table border="1" align="center" width="700" cellpadding="0" cellspacing="0">
          <tr height="30" style="font-weight:bold;">
            <td>新闻编号</td>
            <td>新闻类型</td>
            <td>发表时间</td>
            <td>新闻标题</td>
            <td>评论</td>
            
          </tr>
          <?php if(is_array($search)): $i = 0; $__LIST__ = $search;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr height="25">
            <td>1</td>
            <td><?php echo ($v["typeName"]); ?></td>
            <td><?php echo ($v["dateandtime"]); ?></td>
            <td align="left"><a href=""><?php echo ($v["title"]); ?></a></td>
            <td><a href="">查看评论</a></td>
           
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          <tr>
          <td colspan="5" align="center">
            <?php echo ($pageList); ?>
          </td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>