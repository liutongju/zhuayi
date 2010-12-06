<?php
/**
 * admin_edit.php     ZCMS 模块昔日在
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */


$pagename = "模块安装";
if (empty($_REQUEST['id']))
{
	showmsg('错误的数据与来源','-1');
}
else
{
	$info = $query->one_array("select * from ".T."module where id =".$_REQUEST['id']);
	$info['tables'] = explode(',',$info['tables']);
	/* 删除数据表 */
	foreach ($info['tables'] as $val)
	{
		$query->query("DROP TABLE IF EXISTS `".T.$val."`");
	}
	/* 删除后台菜单 */
	$query->delete("menu"," mid = ".$_REQUEST['id']);
	
	/* 设置模块为未安装 */
	$query->query("update ".T."module set install = 0 where id =".$_REQUEST['id']);
	
	showmsg('卸载成功..',ret_cookie('backurl'));
	exit;
}
?>