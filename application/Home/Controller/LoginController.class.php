<?php 
namespace Home\Controller;

use Think\Verify;
class LoginController extends BaseController{
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
                $this->success("登录失败!",U("Index/index"));
            }else{
                $this->success("登录成功!",U("Index/index"));
            }
        }else{
            $this->success("验证码错误!",U("Index/index"));
        }
       
    }
}