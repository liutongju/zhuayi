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
	//set_time_limit(10);
	if (empty($_REQUEST['id']))
	exit;


	/* ��ѯҪ������ʺ� */
	$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);
	//echo $info['pass'];
	/* ȥ��¼����΢�� �����Ƿ���Ҫ����*/
	$t = new sina();

	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];

	/* ���һ��ʡ�� */
	$province = $query->one_array("select * from ".T."linkage where parent_id = 1 order by rand() limit 0,1");
	$info['province'] = $province['id'];
	$province = $query->one_array("select * from ".T."linkage where parent_id = '".$province['id']."' order by rand() limit 0,1");
	$info['city'] .= $province['orders'];

	/* ����Ա�Ϊ�� ���һ���Ա�  */
	if (empty($info['gender']))
	{
		$info['gender'] = rand(1,2);
	}

	if (empty($info['cookie']))
	{
		echo '�ʺ�δ��¼,���ܽ��в���';
		exit;
	}
	/* �����ʺ� */
	$return = $t->activation($info);

	if ($return == '2' || $return ==1)
	{
		$query->query("update ".T."sina_account set status = 1 where id=".$_REQUEST['id']);
	}
	elseif ($return == '-999')
	{
		echo '-999';
		exit;
	}
	echo $t->error($return);


	exit;
}
else
{
	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = @implode(',',$_REQUEST['id']);

	}
	if (!empty($_REQUEST['id']))
	{
		$search .= " and id in (".$_REQUEST['id'].")";
	}
	$reset = $query->query("select * from ".T."sina_account where status = 0 ".$search.$my);
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