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
	if (empty($info['cookie']))
	{
		echo '帐号未登录,不能进行操作';
		exit;
	}
	$skin = array('skin_060','skin_118','skin_052','skin_053','skin_054','skin_058','skin_059','skin_116','skin_117','skin_114','skin_112','skin_234','skin_046','skin_050','skin_053','skin_054','skin_234','skin_035','skin_046','skin_005','skin_018','skin_001','skin_002','skin_003','skin_004','skin_008','skin_009','skin_118','skin_052','skin_117','skin_033','skin_037','skin_040','skin_044','skin_047','skin_048','skin_007','skin_017','skin_019','skin_006','skin_011','skin_058','skin_059','skin_032','skin_034','skin_036','skin_038','skin_039','skin_042','skin_043','skin_045','skin_049','skin_050','skin_116','skin_114','skin_113','skin_051','skin_112','skin_111','skin_021','skin_023','skin_022','skin_015','skin_060','skin_061');
	$skin = $skin[array_rand($skin)];
	$return = $t->skin($skin);
	if ($return == '1')
	{
		$query->query("update ".T."sina_account set skin='".$skin."' where id=".$_REQUEST['id']);
		echo '更换成功-> '.$skin;
	}
	else
	{
		echo '更换失败:<font color=red>'.$reset.'</font>';
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
	$reset = $query->query("select * from ".T."sina_account where skin = '' ".$search.$my);
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