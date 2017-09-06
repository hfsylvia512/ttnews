<?php 
namespace Admin\Controller;
use Think\Controller;
class UpdateController extends Controller{
	public function index($typeId){
		$newstypes = M("newstypes")->where("typeId={$typeId}")->find();
		//var_dump($newstypes);
		$this->assign("newstypes",$newstypes);
		$this->assign("typeId",$typeId);
		$this->display();
	}
	public function update($typeId){
		// echo $typeId;exit;
		$result = M("newstypes")->where("typeId={$typeId}")->save($_POST);
		//var_dump($result);
		//$this->display("index");
		if($result > 0 ){
			$this->success("新闻修改类型成功！",U("ModType/index"));
		}else{
			$this->success("新闻修改类型失败！",U("Update/update/typeId/{$typeId}"));
		}
	}
}