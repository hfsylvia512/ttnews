<?php 
namespace Home\Controller;
use Think\Page;
class SearchController extends BaseController{
	public function index(){
		$this->assign("totalRow",0);
		$this->display();
	}
	public function search(){
		$keyword = $_GET["keyword"];
		$searchType = $_GET["searchType"];
		//echo $searchType;exit;
		// $title =$_POST["title"];
		// $content = $_POST["content"];
		//echo $title;exit;
		$totalRow =M("newsarticles")->where("{$searchType} like '%{$keyword}%'")->count();
		$page = new Page($totalRow,3);
		$search = M("newsarticles")->where("{$searchType} like '%{$keyword}%'")->limit($page->firstRow,$page->listRows)->select();
				
		//echo M()->getLastSql();exit;
		$this->assign("pageList",$page->show());
		$this->assign("totalRow",$totalRow);
		$this->assign("search",$search);
		$this->display("index");
	}
}