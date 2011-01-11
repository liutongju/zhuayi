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
	/* 判断是否死号 */
	$t = new sina();
	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];
	$return = $t->dead($info['uid']);
	if ($return != '1')
	{

		$query->query("update ".T."sina_account set dead = 1 where id =".$_REQUEST['id']);
		echo '限制了';
		exit;
	}
	else
	{
		echo '此号没被限制';
	}
	//echo '这个不是死号';
	exit;
}
else
{
	if (!empty($_REQUEST['id']))
	{
		$_REQUEST['id'] = implode(',',$_REQUEST['id']);
		$search .= " and id in (".$_REQUEST['id'].")";
	}
	$reset = $query->query("select * from ".T."sina_account where id > 0  ".$search.$my);
	while ($row = $query->fetch_array($reset))
	{
		$id[] =  $row['id'];
		$username[] =  $row['username'];
		$nick[] =  $row['nick'];
	}
	$id =  "'".implode("','",$id)."'";
	$username = "'".implode("','",$username)."'";
	$nick = "'".implode("','",$nick)."'";
	/* 模版 */
	$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/sina/template/admin/sina_task.html';
}


?>