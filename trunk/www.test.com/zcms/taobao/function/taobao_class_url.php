<?php
function taobao_class_url($id)
{
	//-------载入配置文件
	return '/taobao/class/cid/'.$id;
}

function taobao_special_url($id)
{
	//-------载入配置文件
	return '/taobao/special/id/'.$id;
}

//-------淘宝地址转换，防止搜索引擎知道是taobao的
function taobao_urlshort($str)
{
	global $weburl;
	$str = base64_encode($str);
	$str = str_replace('/','zcms',$str);
	return $weburl.'/urlshort/'.$str;
}
?>