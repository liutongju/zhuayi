<?php
/**
 * admin_del.php     ZCMS 后台菜单删除
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
	showmsg('您没有指定要删除哪个分类..',-1);
}
else
{

	/* 写入日志 */
	admin_log("record_class",$_REQUEST['id'],'classname','删除分类');
	$query->delete("record_class"," id =".$_REQUEST['id']);
	showmsg('恭喜您，删除成功',ret_cookie('backurl'));
}exit;
?>