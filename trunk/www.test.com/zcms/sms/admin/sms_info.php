<?php
/**
 * admin_info.php     ZCMS 后台文章栏目入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

 

if (empty($_REQUEST['id']))
{
	$pagename = '添加号码';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("sms",$_POST);
}
else
{
	$pagename = '编辑号码';
	$query->save("sms",$_POST,' id = '.$_POST['id']);
}


/* 写入日志 */
admin_log("sms",$_POST['id'],'sms',$pagename);
showmsg('恭喜您,操作成功..现在去生成缓存',ret_cookie('backurl'));
?>