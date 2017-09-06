<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>后台管理系统</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="/Psd1704/11ThinkPHP/ttnews/public/css/admin.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/Psd1704/11ThinkPHP/ttnews/library/jquery/jquery-1.4.js"></script>
    <script type="text/javascript" src="/Psd1704/11ThinkPHP/ttnews/library/kindeditor/kindeditor.js"></script>
    <script type="text/javascript">
      var editor;
      KindEditor.ready(function(e){
          editor = e.create("[name=content]",{
              width:"700px",
              height:"260px"
          });
      });
      //表单验证
      function checkAdd()
      {
        if(document.frm.title.value == "")
          {
              alert("请输入新闻标题！");
              document.frm.title.focus();
              return false;
          }
        else if(editor.html() == "")
          {
              alert("请输入新闻内容！");
              editor.focus();
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
        <br>
        <form name="frm" method="post" action="/Psd1704/11ThinkPHP/ttnews/admin.php/AddNews/add" enctype="multipart/form-data" onsubmit="return checkAdd()">
        <table class="addNewsTb" bgcolor="#DCDCDC" border="0" align="center" width="700">
          <tr>
            <td>新闻标题：</td>
            <td><input type="text" name="title" size="50"></td>
          </tr>
          <tr>
            <td>新闻类型：</td>
            <td>
              <select name="typeId">
                <option value="1">国内新闻</option>
                <option value="2">体育新闻</option>
                <option value="3">国际新闻</option>
                <option value="4">科技新闻</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>新闻作者：</td>
            <td><input type="text" name="userName" size="50"></td>
          </tr>
          <tr>
            <td>新闻来源：</td>
            <td><input type="text" name="source" size="50"></td>
          </tr>
          <tr>
            <td>新闻图片：</td>
            <td><input type="file" name="myFile" size="20"></td>
          </tr>
          <tr>
            <td colspan="2"><textarea name="content"></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input type="submit" value="添加" class="btn2">
              &nbsp;&nbsp;&nbsp;
              <input type="reset" value="取消" class="btn2">
            </td>
          </tr>
        </table>
        </form>
      </div>
    </div>
  </body>
</html>