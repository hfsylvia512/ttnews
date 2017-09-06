<?php 
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
	public function _initialize(){
		//导航
    	$newstypes = M("newstypes")->select();
    	$this->assign("newstypes",$newstypes);
	}
}