<?php
/**
 * admin_index.php     ZCMS 后台菜单列表
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* 设置返回URL */
if (!empty($_REQUEST['id']))
{
	$pagename = "内容栏目编辑";
	$info = $query->one_array("select * from ".T."sina_content_class where id =".$_REQUEST['id']);
}
else
{
	$pagename = "内容栏目添加";
}

?>