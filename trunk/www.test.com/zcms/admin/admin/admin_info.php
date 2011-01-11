<?php
/**
 * admin_info.php     ZCMS 修改或添加管理员
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */
$_POST['username'] = siconv($_POST['username']);
if (empty($_REQUEST['id']))
{
	$pagename = '添加管理员';
	$_POST['pass'] = mymd5($_POST['pass']);
	$_REQUEST['id'] = $query->save("admin",$_POST);

}
else
{
	$pagename = '修改管理员';
	if (!empty($_POST['pass']))
	{
		$_POST['pass'] = mymd5($_POST['pass']);
	}
	else
	{
		unset($_POST['pass']);
	}
	$query->save("admin",$_POST,' id='.$_REQUEST['id']);
}
/* 写入日志 */
admin_log("admin",$_REQUEST['id'],'username',$pagename,$_REQUEST['id']);
exit('1');
?>