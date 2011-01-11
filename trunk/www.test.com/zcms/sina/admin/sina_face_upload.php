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
	/*
	$filepath = ZCMS_ROOT.'/zcms/sina/face';
	$handle = opendir($filepath);
	$i=1;
	while (false !== ($file = readdir($handle)))
	{
		$i++;
		if ($file != "." && $file != ".." && $file != ".DS_Store")
		{
			$files[]= $filepath.'/'.$file;
		}

	}
	closedir($handle);
	set_time_limit(0);
	//for
	foreach ($files as $face)
	{
		list($width, $height) = getimagesize($face);
		//echo $width;

		if ($width >180)
		$query->query("insert into ".T."sina_face(face)values('".$face."')");
		else
		unlink($face);

	}
	exit;
	*/
	$litpic = $query->one_array("select * from ".T."sina_face order by rand()");

	$return = $t->face_upload($litpic['face']);

	if ($return == 1)
	{
		$query->query("update ".T."sina_account set litpic = '".$litpic['face']."' where id=".$_REQUEST['id']);
		echo '上传成功';
	}
	else
	{
		echo '上传失败:<font color=red>'.$return['error'].'</font>';
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
	$reset = $query->query("select * from ".T."sina_account where status = 1 and litpic ='' ".$search.$my);
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