<?php
/**
 * admin_login_info.php     ZCMS 登录验证
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 判断验证码 */
$code = ret_cookie('checkcode');
if (md5($_POST['code']) != $code)
{
	showmsg('验证码错误...',-1);
}
/* 验证登录 */
$info = $query->one_array("select * from ".T."admin where username = '".$_POST['username']."' and pass = '".mymd5($_POST['password'])."'");
if (empty($info['id']))
{
	showmsg("账号或密码错误..",'-1');
}
else
{
	/* 更新登录时间 */
	$query->query("update ".T."admin set login_time = ".time().", login_ip ='".get_ip()."'");
	set_cookie('admin_username',$_POST['username']);
	set_cookie('admin_userid',$info['id']);
	/* 写入日志 */
	admin_log("admin",$info['id'],'username','后台登录',$info['id']);
	showmsg('登录成功！','/index.php?m=admin&c=index&a=init');
}
exit;
?>