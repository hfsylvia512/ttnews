<?php 
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class SearchController extends Controller{
	public function index(){

		$this->display();
	}
	public function search(){
		$keyword = $_GET["keyword"];
 		$searchType = $_GET["searchType"];
 		//获得总页数
 		$totalRow = M("newsarticles")->where("{$searchType} like '%{$keyword}%'")->count();
 		//echo $totalRow;exit;
 		// 实例化
 		$page = new Page($totalRow,2);
 		$search = M("newsarticles")->join("newstypes on newsarticles.typeId=newstypes.typeId")->where("{$searchType} like '%{$keyword}%'")->limit($page->firstRow,$page->listRows)->select();
 		//echo M()->getLastSql();
 		//var_dump($search);exit;
 		$this->assign("pageList",$page->show());
 		$this->assign("search",$search);
 		$this->display("index");
	}
}