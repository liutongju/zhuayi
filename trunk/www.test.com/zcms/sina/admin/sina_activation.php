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
	//set_time_limit(10);
	if (empty($_REQUEST['id']))
	exit;


	/* 查询要激活的帐号 */
	$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
	//echo $info['pass'];
	/* 去登录新浪微博 看看是否需要激活*/
	$t = new sina();

	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];

	/* 随机一个省份 */
	$province = $query->one_array("select * from ".T."linkage where parent_id = 1 order by rand() limit 0,1");
	$info['province'] = $province['id'];
	$province = $query->one_array("select * from ".T."linkage where parent_id = '".$province['id']."' order by rand() limit 0,1");
	$info['city'] .= $province['orders'];

	/* 如果性别为空 随机一个性别  */
	if (empty($info['gender']))
	{
		$info['gender'] = rand(1,2);
	}

	if (empty($info['cookie']))
	{
		echo '帐号未登录,不能进行操作';
		exit;
	}
	/* 激活帐号 */
	$return = $t->activation($info);

	if ($return == '2' || $return ==1)
	{
		$query->query("update ".T."sina_account set status = 1 where id=".$_REQUEST['id']);
	}
	elseif ($return == '-999')
	{
		echo '-999';
		exit;
	}
	echo $t->error($return);


	exit;
}
else
{
	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = @implode(',',$_REQUEST['id']);

	}
	if (!empty($_REQUEST['id']))
	{
		$search .= " and id in (".$_REQUEST['id'].")";
	}
	$reset = $query->query("select * from ".T."sina_account where status = 0 ".$search.$my);
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