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

$tips = "���磺http://t.sina.com.cn/1753070263/  (ֻ��д1753070263,����,���ID�á�,������)";
if ($_REQUEST['act']==1)
{
	$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
	//echo $info['pass'];
	/* ȥ��¼����΢�� �����Ƿ���Ҫ����*/
	$t = new sina();
	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];
	//echo $_REQUEST['default'];
	$reset = $t->attention($_REQUEST['default'],$info['uid']);
	if ($reset == '1')
	{
		$query->query("update ".T."sina_account set attention= attention +1 where id=".$_REQUEST['id']);
		echo '��ע�ɹ�';
	}
	elseif ($reset['error'] == '{"code":"MR0050"}')
	{

		echo '����IP';
		exit;
	}
	else
	{
		echo '��עʧ��:<font color=red>'.$reset['error'].'</font>';
	}
	exit;
}
elseif ($_REQUEST['act']==2)
{
	/* �������Ĺ�ע�˵�ַ */
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
	/* ģ�� */
	$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/sina/template/admin/sina_task.html';
}


?>