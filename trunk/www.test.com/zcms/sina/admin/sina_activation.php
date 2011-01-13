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

	if (empty($info['cookie']))
	{
		echo '-1';
		exit;
	}
	/* 激活帐号 */
	$return = $t->activation($info,ret_cookie('activation_code'),$_REQUEST['code']);

	if ($return == '2' || $return ==1)
	{
		echo '1';
		$query->query("update ".T."sina_account set status = 1 , ip2 = '".ret_cookie('ip')."' where id=".$_REQUEST['id']);
	}
	elseif ($return == '-999')
	{
		echo '-999';
		exit;
	}
	else
	{
		echo $return;
	}
	//echo $t->error($return);


	exit;
}
/* 返回验证码 */
elseif ($_REQUEST['act'] == 'code')
{
	$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
	$t = new sina();
	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];
	echo $return = $t->token();
	exit;
}

$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);

?>