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
	$t->cookies =  $info['cookie'];

	/* 判断性别 没有则随机 */
	if (empty($info['gender']))
	{
		$info['gender'] = rand(1,2);
	}
	/* 如果省份为空 随机一个省份 */
	if (empty($info['province']))
	{
		$province = $query->one_array("select * from ".T."linkage where parent_id = 1 order by rand() limit 0,1");
		$info['province'] = $province['id'];
		$province = $query->one_array("select * from ".T."linkage where parent_id = '".$province['id']."' order by rand() ");
		$info['city'] .= $province['orders'];
	}
	else
	{
		$info['province'] = explode(',',$info['province']);
		$info['province'] = $info['province'][0];
		$info['city'] = $info['province'][1];
	}

	/* 随机个人签名 */
	$sign = $query->one_array("select * from ".T."sina_sign order by rand() limit 0,1");
	$info['sign'] = $sign['sign'];

	/* 虚拟一个QQ号 */
	$info['qq'] = rand(589681,384919184);

	/* 虚拟一个生日 */
	$info['birthday'] = date("Y-m-d",rand(316713600,695404800));

	$return = $t->myinfo($info);
	if ($return == '1')
	{
		$info['province'] .= ','.$info['city'];
		$query->save("sina_account",$info,' id='.$_REQUEST['id']);
		echo '虚拟资料成功';
	}
	else
	{
		echo '虚拟资料失败:<font color=red>'.$return['error'].'</font>';
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
	$reset = $query->query("select * from ".T."sina_account where sign = '' ".$search.$my);
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