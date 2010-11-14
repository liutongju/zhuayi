<?php
/**
 * admin_login_info.php     ZCMS 锁屏解锁验证
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

//------触发锁屏，设置锁屏cookie的值，如果有值，刷新页面时自动打开锁屏状态 
if ($_GET['lock'] == 1)
{
	set_cookie('admin_lock',1);
	exit;
} 

$userid = ret_cookie('admin_userid');


if (empty($userid))
{
	//-----取消锁屏COOKIE的值
	set_cookie('admin_lock','');
	
	exit('-1');
} 

//------验证登录
$info = $query->one_array("select * from ".T."admin where id = '".$userid."' and pass = '".mymd5($_POST['password'])."'");
if (empty($info['id']))
{
	//-----取消锁屏COOKIE的值
	//set_cookie('admin_lock','0');
	exit('-2');
}
set_cookie('admin_lock','0');
exit;
?>