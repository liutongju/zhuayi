<?php
/**
 * index.php     ZCMS ����ļ�
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
		exit('��ʽ��ʧ��,���ʺ�δ��¼');
	}
	$t = new sina();
	$return = $t->ret_nickname($info['uid']);

	if ($return['code'] == '1')
	{
		$query->query("update ".T."sina_account set nick ='".$return['error']."' where id=".$_REQUEST['id']);
		echo '��ʽ���ǳƳɹ�:'.$return['error'];
	}
	else
	{
		echo '��ʽ���ǳ�ʧ��:<font color=red>'.$return['error'].'</font>';
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