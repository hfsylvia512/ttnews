<?php 	
namespace Admin\Controller;
use Think\Controller;
class AddTypeController extends Controller{
	public function index(){

		$this->display();
	}
	public function add(){
		//返回的是主键
		$result = M("newstypes")->add($_POST);
		//var_dump($result);exit;
		if($result > 0 ){
			$this->success("新闻类型添加成功！",U("ModType/index"));
		}else{
			$this->success("新闻类型添加失败！",U("AddType/index"));
		}
	}
}