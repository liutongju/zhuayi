<?php
function article_class_url($id)
{
	//-------���������ļ�
	include_once ZCMS_ROOT.'/zcms/article/include/article_config.php';
	global $class_url;
	return str_replace('{id}',$id,$class_url);
}
?>