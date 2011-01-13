<?php
/**
 * index.php     ZCMS 入口文件
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */




$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
$t = new sina();
$t->username = $info['username'];
$t->password = $info['pass'];
$t->cookies =  $info['cookie'];

/* 判断帐号是否登录了 */
if ((time() - $info['login_time']) > 86000)
{
	$reset = $t->login();
	if ($reset['code'] == '-1')
	{
		exit('登录失败');
	}
	else
	{
		/* 写入COOKIE */
		$query->query("update ".T."sina_account set cookie ='".$reset['cookie']."',uid='".$reset['uid']."',login_time = '".time()."' where id=".$_REQUEST['id']);
		$t->cookies = $reset['cookie'];
	}
}

 ?>