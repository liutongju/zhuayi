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
	$pagename = '添加微博内容栏目';
	$_POST['dtime'] = time();
	$class = $query->one_array("select id from ".T."sina_content_class where classname = '".$_POST['classname']."'");
	if(!$class['id']){
		$_POST['id'] = $query->save("sina_content_class",$_POST);
	}
}
else
{
	$pagename = '修改微博内容栏目';
	$query->save("sina_content_class",$_POST,' id = '.$_POST['id']);
	
}
/* 写入日志 */
admin_log("sina_content_class",$_POST['id'],'微博内容栏目',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>