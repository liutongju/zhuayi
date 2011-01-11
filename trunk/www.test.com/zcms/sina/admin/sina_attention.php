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

$tips = "例如：http://t.sina.com.cn/1753070263/  (只填写1753070263,即可,多个ID用“,”隔开)";
if ($_REQUEST['act']==1)
{
	$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
	//echo $info['pass'];
	/* 去登录新浪微博 看看是否需要激活*/
	$t = new sina();
	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];
	//echo $_REQUEST['default'];
	$reset = $t->attention($_REQUEST['default'],$info['uid']);
	if ($reset == '1')
	{
		$query->query("update ".T."sina_account set attention= attention +1 where id=".$_REQUEST['id']);
		echo '关注成功';
	}
	elseif ($reset['error'] == '{"code":"MR0050"}')
	{

		echo '更换IP';
		exit;
	}
	else
	{
		echo '关注失败:<font color=red>'.$reset['error'].'</font>';
	}
	exit;
}
elseif ($_REQUEST['act']==2)
{
	/* 处理传来的关注人地址 */
	//$_REQUEST['default'] = explode('/',$_REQUEST['default']);
	//$_REQUEST['default'] = $_REQUEST['default'][3];

	if (!empty($_REQUEST['id']))
	{
		$_REQUEST['id'] = implode(',',$_REQUEST['id']);
		$search .= " and id in (".$_REQUEST['id'].")";
	}
	$reset = $query->query("select * from ".T."sina_account where  status = 1 and id < 566  ".$search.$my.' order by id desc');
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