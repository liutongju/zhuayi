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

if (!empty($_REQUEST['id']))
{
	$search = ' and id <>'.$_REQUEST['id'];
}if ($query->maxnum("select count(*) from ".T."keylink where title ='".$_POST['title']."'".$search)>0)
{
	showmsg('关键词重复了',-1);
}
if (empty($_REQUEST['id']))
{
	
	$pagename = '添加网站内链接';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("keylink",$_POST);
}
else
{
	$pagename = '修改网站内链接';
	$query->save("keylink",$_POST,' id = '.$_POST['id']);
	
}
//---------写入日志
admin_log("keylink",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>