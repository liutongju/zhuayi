<?php
function taobao_class_url($id)
{
	//-------���������ļ�
	return '/taobao/class/cid/'.$id;
}

function taobao_special_url($id)
{
	//-------���������ļ�
	return '/taobao/special/id/'.$id;
}

//-------�Ա���ַת������ֹ��������֪����taobao��
function taobao_urlshort($str)
{
	global $weburl;
	$str = base64_encode($str);
	$str = str_replace('/','zcms',$str);
	return $weburl.'/urlshort/'.$str;
}
?>