<?php 
function truncate($str){
	$len = mb_strlen($str,"utf-8");
	if($len >15){
		$str = mb_substr($str,0,15,"utf-8")."...";

	}
	return $str;
}