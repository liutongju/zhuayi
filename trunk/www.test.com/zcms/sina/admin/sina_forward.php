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

$tips = "����Ϊ��ʵ΢����ַ,���磺http://t.sina.com.cn/1813889691/5en0rSbcukw/";
if ($_REQUEST['act']==1)
{
	$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
	//echo $info['pass'];
	/* ȥ��¼����΢�� �����Ƿ���Ҫ����*/
	$t = new sina();
	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];

	$reset = $t->forward($_REQUEST['default']);
	if ($reset == '1')
	{
		echo 'ת���ɹ�';
	}
	else
	{
		echo 'ת��ʧ��:<font color=red>'.$reset['error'].'</font>';
	}
	exit;
}
elseif ($_REQUEST['act']==2)
{
	/* ��������ת����ַ */
	$_REQUEST['default'] =  urlencode($_REQUEST['default']);

	if (!empty($_REQUEST['id']))
	{
		$_REQUEST['id'] = implode(',',$_REQUEST['id']);
		$search .= " and id in (".$_REQUEST['id'].")";
	}
	$reset = $query->query("select * from ".T."sina_account where  status = 1 ".$search.$my);
	while ($row = $query->fetch_array($reset))
	{
		$id[] =  $row['id'];
		$username[] =  $row['username'];
		$nick[] =  $row['nick'];
	}
	$id =  "'".implode("','",$id)."'";
	$username = "'".implode("','",$username)."'";
	$nick = "'".implode("','",$nick)."'";
	/* ģ�� */
	$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/sina/template/admin/sina_task.html';
}


?>