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
	$pagename = '添加搜索关键词';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("search",$_POST);
}
else
{
	$pagename = '修改搜索关键词';
	$query->save("search",$_POST,' id = '.$_POST['id']);
	
}
/* 写入日志 */
admin_log("search",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>