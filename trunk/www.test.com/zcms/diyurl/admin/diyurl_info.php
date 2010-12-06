<?php
/**
 * admin_info.php     ZCMS 后台自定义URL入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']))
{
	$pagename = '添加自定义URL';
	$_POST['id'] = $query->save("seo",$_POST);
}
else
{
	$pagename = '修改自定义URL';
	$query->save("seo",$_POST,' id = '.$_POST['id']);
	
}
/* 写入日志 */
admin_log("seo",$_POST['id'],'url',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>