<?php
/**
 * admin_info.php     ZCMS 后台菜单入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '添加菜单';
	$_POST['id'] = $query->save("menu",$_POST);
}
else
{
	$pagename = '修改菜单';
	if (is_array($_REQUEST['orders']))
	{
		$pagename = '排序菜单';
		foreach ($_REQUEST['id'] as $key=>$value)
		{
			$order['orders'] = $_POST['orders'][$key];
			$query->save("menu",$order,' id='.$value);
		}
	}
	else
	{
		$query->save("menu",$_POST,' id = '.$_POST['id']);
	}
	
}
/* 写入日志 */
admin_log("menu",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>