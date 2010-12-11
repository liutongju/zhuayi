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
	$pagename = '添加分类';
	$_POST['id'] = $query->save("sms_class",$_POST);
}
else
{
	$pagename = '编辑分类';
	$query->save("sms_class",$_POST,' id = '.$_POST['id']);
}


/* 写入日志 */
admin_log("sms_class",$_POST['id'],'classname',$pagename);
showmsg('恭喜您,操作成功..现在去生成缓存',ret_cookie('backurl'));
?>