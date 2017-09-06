<?php 
namespace Home\Controller;
class NewsController extends BaseController{
	public function index($articleId){
		//查询当前新闻
		$news = M("newsarticles")->join("newstypes on newsarticles.typeId=newstypes.typeId ")->where("articleId={$articleId}")->find();
		//增加新闻的点击量
		$result = M("newsarticles")->where("articleId={$articleId}")->setInc("hints");
		$review = M("reviews")->where("articleId={$articleId}")->limit(0,2)->order("dateandtime desc")->select();
		$this->assign("review",$review);
		$this->assign("news",$news);
		$this->display();
	}
	public function reviews($articleId){
		
		$_POST["articleId"]=$articleId;
		//echo $content;exit;
		$result = M("reviews")->where("articleId={$articleId}")->add($_POST);
		//var_dump($review);exit;
		if($result > 0){
			$this->success("评论成功",U("News/index",array("articleId"=>$articleId)));
		}else{
			$this->success("评论失败",U("News/index",array("articleId"=>$articleId)));
		}
	}

}
	
