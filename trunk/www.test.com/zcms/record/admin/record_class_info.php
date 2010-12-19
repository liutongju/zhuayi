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
if (empty($_POST['share']))
{
	$_POST['share'] = 0;
}
if (empty($_POST['id']) && !is_array($_POST['orders']))
{
	$pagename = '添加分类';
	$_POST['id'] = $query->save("record_class",$_POST);
}
else
{
	$pagename = '编辑分类';
	if (is_array($_POST['orders']))
	{
		$pagename = '排序菜单';
		foreach ($_POST['id'] as $key=>$value)
		{
			$order['orders'] = $_POST['orders'][$key];
			$query->save("record_class",$order,' id='.$value);
		}
	}
	else
	{
		$query->save("record_class",$_POST,' id = '.$_POST['id']);
	}
	
}
/* 写入日志 */
admin_log("record_class",$_POST['id'],'classname',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>