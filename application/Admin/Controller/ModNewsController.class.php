<?php 
 namespace Admin\Controller;
 use Think\Controller;
 use Think\Page;
 class ModNewsController extends Controller{
 	public function index(){
 		$totalRow = M("newsarticles")->count();
 		$page = new Page($totalRow,10);
 		$newsInfo = M("newsarticles")->join("newstypes on newsarticles.typeId=newstypes.typeId")->order("articleId asc")->limit($page->firstRow,$page->listRows)->select();
 		$this->assign("pageList",$page->show());
 		$this->assign("newsInfo",$newsInfo);
 		$this->display();
 	}
 	public function search(){
 		$keyword = $_GET["keyword"];
 		$searchType = $_GET["searchType"];
 		//获得总页数
 		$totalRow = M("newsarticles")->where("{$searchType} like '%{$keyword}%'")->count();
 		//echo $totalRow;exit;
 		// 实例化
 		$page = new Page($totalRow,3);
 		$newsInfo = M("newsarticles")->join("newstypes on newsarticles.typeId=newstypes.typeId")->where("{$searchType} like '%{$keryword}%'")->limit($page->firstRow,$page->listRows)->select();
 		//var_dump($newsInfo);exit;
 		$this->assign("pageList",$page->show());
 		$this->assign("newsInfo",$newsInfo);
 		$this->display("index");
 	}
 }