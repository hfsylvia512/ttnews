<?php 
 namespace Admin\Controller;
 use Think\Controller;
 use Think\Upload;
 class AddNewsController extends Controller{
 	public function index(){
 		$this->display();
 	}
 	public function add(){
 		// 实例化
 		$upload = new Upload();
 		// 设置允许上传文件的扩展名
 		$upload ->maxSize = 2000000;
 		$upload->exts = array("jpg","gif","png");
 		$upload->autoSub = false;
 		$upload->rootPath = "./";
 		$upload->savePath = "public/newspicture/";
 		$result = $upload->uploadOne($_FILES["myFile"]);
 		//var_dump($_FILES["myFile"]["saveName"]);exit;
 		//var_dump($result["savename"]);exit;
 		// var_dump($upload->saveName);exit;
 		// var_dump($_POST);
 		// var_dump($_FILES);
 		// exit;
 		if($result){
 			$_POST["imagepath"]="newspicture/".$result["savename"];
 			//var_dump($_POST["imagepath"]);exit;
 			//var_dump($_POST);exit;
 			$result = M("newsarticles")->add($_POST);
 			//echo M()->getLastSql();exit;
 			if($result > 0 ){
 				$this->success("新闻添加成功!",U("AddNews/index"));
 			}else{
 				$this->success("新闻添加失败!",U("AddNews/index"));
 			}
 		}else{
 			$errorMsg = $upload->getError();
 			$this->success($errorMsg,U("AddNews/index"));
 		}
 	}
 }