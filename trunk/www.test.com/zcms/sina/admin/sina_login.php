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


if ($_REQUEST['act']==1)
{
	$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
	//echo $info['pass'];
	/* 去登录新浪微博 看看是否需要激活*/
	$t = new sina();
	$t->username = $info['username'];
	$t->password = $info['pass'];
	$reset = $t->login();
	if ($reset == '-1')
	{
		echo '登录失败..';
	}
	else
	{

		/* 写入COOKIE */
		$query->query("update ".T."sina_account set cookie ='".$reset['cookie']."',uid='".$reset['uid']."' where id=".$_REQUEST['id']);
		echo '登录成功';
	}
	exit;
}
else
{
	if (!empty($_REQUEST['id']))
	{
		$_REQUEST['id'] = implode(',',$_REQUEST['id']);
		$search .= " and id in (".$_REQUEST['id'].")";
	}
	$reset = $query->query("select * from ".T."sina_account where id >0  ".$search.$my);
	while ($row = $query->fetch_array($reset))
	{
		$id[] =  $row['id'];
		$username[] =  $row['username'];
		$nick[] =  $row['nick'];
	}
	$id =  "'".implode("','",$id)."'";
	$username = "'".implode("','",$username)."'";
	$nick = "'".implode("','",$nick)."'";
}


?>