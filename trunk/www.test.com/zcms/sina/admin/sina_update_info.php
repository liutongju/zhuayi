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
	//echo $info['pass'];
	/* ȥ��¼����΢�� �����Ƿ���Ҫ����*/
	$t = new sina();
	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];

	/* �ж��Ա� û������� */
	if (empty($info['gender']))
	{
		$info['gender'] = rand(1,2);
	}
	/* ���ʡ��Ϊ�� ���һ��ʡ�� */
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

	/* �������ǩ�� */
	$sign = $query->one_array("select * from ".T."sina_sign order by rand() limit 0,1");
	$info['sign'] = $sign['sign'];

	/* ����һ��QQ�� */
	$info['qq'] = rand(589681,384919184);

	/* ����һ������ */
	$info['birthday'] = date("Y-m-d",rand(316713600,695404800));

	$return = $t->myinfo($info);
	if ($return == '1')
	{
		$info['province'] .= ','.$info['city'];
		$query->save("sina_account",$info,' id='.$_REQUEST['id']);
		echo '�������ϳɹ�';
	}
	else
	{
		echo '��������ʧ��:<font color=red>'.$return['error'].'</font>';
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
	/* ģ�� */
	$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/sina/template/admin/sina_task.html';
}


?>