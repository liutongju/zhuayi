<?php
/**
 * admin_del.php     ZCMS 后台管理员删除
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 判断来路ID是否存在 */
if (empty($_REQUEST['id']))
{
	showmsg('您没有指定要删除哪个连接..',-1);
}
else
{
	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = @implode(',',$_REQUEST['id']);
	}
	$query->delete("admin"," id in (".$_REQUEST['id'].")");
	/* 写入日志 */
	admin_log("admin",$_REQUEST['id'],'username','删除后台管理员');
	showmsg('删除成功..',ret_cookie('backurl'));
}exit;
?>