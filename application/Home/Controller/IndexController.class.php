<?php
namespace Home\Controller;
use Think\Verify;

class IndexController extends BaseController {
    public function index(){
    	
    	
    	//热点要闻 6条
    	$hotNews = M("newsarticles")->join("newstypes on newsarticles.typeId=newstypes.typeId")->order("hints desc")->limit(0,6)->select();
    	// 新闻总数
    	$count = M("newsarticles")->count();
    	$newstypes = M("newstypes")->select();
        foreach($newstypes as $k=>$v){
            $v["news"]=M("newsarticles")->where("typeId={$v["typeId"]}")->order("dateandtime desc")->limit(0,2)->select();
            $newstypes[$k]=$v;
        }
        $this->assign("newstypes",$newstypes);
        
    	$this->assign("count",$count);
    	$this->assign("hotNews",$hotNews);
    	$this->assign("akg",$akg);
    	$this->assign("internation",$internation);
    	$this->assign("sportsNews",$sportsNews);
    	$this->assign("news",$news);
    	
        $this->display();
    }
    public function image(){
        // 实例化验证码类
        $verify = new Verify();
        // 设置字体大小
        $verify->fontSize=15;
        // 设置验证码长度
        $verify->length = 4;
        // 调用验证码函数
        $verify->entry();
    }
    public function login(){
        $userName = $_POST["userName"];
        $password = $_POST["password"];
        $checkCode =$_POST["checkCode"];
        $verify = new Verify();
        $result = $verify->check($checkCode);

       //var_dump($result);exit;
        if($result){
            $userInfo = M("manager")->where("userName='{$userName}' and password='{$password}'")->find();
           // echo M()->getLastSql();exit;
            if($userInfo == null){
                $this->success("登录失败!",U("Index/login"));
            }else{
                $this->success("登录成功!",U("Index/login"));
            }
        }else{
            $this->success("验证码错误!",U("Index/index"));
        }
        $this->display("index");
    }
}