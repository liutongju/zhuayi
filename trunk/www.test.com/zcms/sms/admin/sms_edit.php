<?php
/**
 * admin_edit.php     ZCMS 后台文章编辑、添加
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */


if (!empty($_REQUEST['id']))
{
	$pagename = "号码编辑";
	$info = $query->one_array("select * from ".T."sms where id =".$_REQUEST['id']);
}
else
{
	$pagename = "号码添加";
	$info['cid'] = 0;
}
/* 转换来源 */
$source = explode('|',$source);
?>