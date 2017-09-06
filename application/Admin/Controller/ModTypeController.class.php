<?php 
namespace Admin\Controller;
use Think\Controller;
class ModTypeController extends Controller{
	public function index(){
		$newsType = M("newstypes")->select();
		$this->assign("newsType",$newsType);
		$this->display();
	}
	public function delete($typeId){
		$result = M("newstypes")->where("typeId={$typeId}")->delete();
		// var_dump($result);
		if($result > 0){
			$this->success("删除新闻类型成功！",U("ModType/index"));
		}else{
			$this->success("删除新闻类型失败！",U("ModType/index"));
		}
	}
}

