<?php 
namespace Home\Controller;
class NewsTypeController extends BaseController{
	public function index($typeId){
		$newsInfo = M("newsarticles")->join("newstypes on newsarticles.typeId=newstypes.typeId ")->where("newsarticles.typeId={$typeId}")->select();
		//echo M()->getLastSql();
		$newsTypes = M("newstypes")->where("typeId={$typeId}")->find();
		//echo M()->getLastSql();exit;
		$this->assign("newsTypes",$newsTypes);
		$this->assign("newsInfo",$newsInfo);
		//var_dump($newsInfo); exit;
		$this->display();
	}
}