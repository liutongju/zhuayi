<?php
/**
 * admin_edit.php     ZCMS ��̨���±༭�����
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */


if ($_REQUEST['play'] != 1)
{
	if (empty($_REQUEST['id']))
	{
		showmsg('�Ҳ�֪����Ҫ���Ǹ�����Ķ���Ŷ',-1);
	}

	/* ��ѯ���� */
	$info = $query->one_array("select * from ".T."sms_task where id=".$_REQUEST['id']);
	/* �ж��Ƿ���� */
	if (strpos('%'.$info['sms'],'<!cid')<=0)
	{
		showmsg('������ռ���',-1);
	}

	$info['sms'] = str_replace('<!cid,','',$info['sms']);
	$info['sms'] = str_replace('>','',$info['sms']);
	/* ������ĿID��ȡ���� */
	$reset = $query->query("select sms,username from ".T."sms where cid in (".$info['sms'].")");
	while ($row = $query->fetch_array($reset))
	{
		$sms_num[] = $row['sms'];
		$username[] = $row['username'];
	}
	$sms_num =  '"'.implode("\",\"",$sms_num).'"';
	$username =  '"'.implode("\",\"",$username).'"';
	/* �����ǰ��ͳ�� */
	$query->query("update ".T."sms_task set `ok` = 0,`error` = 0 where id=".$_REQUEST['id']);
	
	/* ���� */
	$toll = ceil(strlen($info['body'])/120);
	
}
else
{
	$reset = 0;
	/* ����״̬ */
	if ($reset == 0)
	{
		$query->query("update ".T."sms_task set ok = ok+1 where id=".$_REQUEST['id']);
		$query->query("update ".T."sms_statistics set sms_num=sms_num+".$_REQUEST['toll']);
	}
	else
	{
		$query->query("update ".T."sms_task set error = error+1 where id=".$_REQUEST['id']);
	}
	echo $reset;
	
	exit;
}
?>