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




$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
$t = new sina();
$t->username = $info['username'];
$t->password = $info['pass'];
$t->cookies =  $info['cookie'];

/* �ж��ʺ��Ƿ��¼�� */
if ((time() - $info['login_time']) > 86000)
{
	$reset = $t->login();
	if ($reset['code'] == '-1')
	{
		exit('��¼ʧ��');
	}
	else
	{
		/* д��COOKIE */
		$query->query("update ".T."sina_account set cookie ='".$reset['cookie']."',uid='".$reset['uid']."',login_time = '".time()."' where id=".$_REQUEST['id']);
		$t->cookies = $reset['cookie'];
	}
}

 ?>