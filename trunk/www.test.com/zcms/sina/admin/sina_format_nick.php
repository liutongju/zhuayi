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
	if (empty($info['uid']))
	{
		exit('格式化失败,该帐号未登录');
	}
	$t = new sina();
	$return = $t->ret_nickname($info['uid']);

	if ($return['code'] == '1')
	{
		$query->query("update ".T."sina_account set nick ='".$return['error']."' where id=".$_REQUEST['id']);
		echo '格式化昵称成功:'.$return['error'];
	}
	else
	{
		echo '格式化昵称失败:<font color=red>'.$return['error'].'</font>';
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
	$reset = $query->query("select * from ".T."sina_account where nick = '' ".$search.$my);
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