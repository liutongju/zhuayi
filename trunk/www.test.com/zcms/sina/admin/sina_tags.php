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

	$tags3 = $query->arrays("select title from ".T."sina_tags order by rand() limit 0 , 5");
	$info = $query->one_array("select a.* from ".T."sina_account as a  where a.id = ".$_REQUEST['id']);

	foreach ($tags3 as $val)
	{
		$tags2[] = $val['title'];
	}

	$info['tags'] = $tags2;
	//echo $info['pass'];
	/* ȥ��¼����΢�� �����Ƿ���Ҫ����*/
	$t = new sina();
	$t->username = $info['username'];
	$t->password = $info['pass'];
	$t->cookies =  $info['cookie'];
	$info['account_tags'] = explode(',',$info['account_tags']);
	//$info['tags'] = explode(',',$info['tags']);

	$tags = array_filter(str_replace($info['account_tags'],'',$info['tags']));
	$tags = implode(' ',$tags);
	if (empty($tags))
	{
		exit('���±�ǩʧ��:<font color=red>û����Ҫ���µı�ǩ</font>');
	}


	$return = $t->tags($tags);
	if ($return == '1')
	{
		$query->query("update ".T."sina_account set account_tags = concat(account_tags,'".implode(',',explode(' ',$tags))."') where id = ".$_REQUEST['id']);
		echo '���±�ǩ�ɹ�';
	}
	else
	{
		echo '���±�ǩʧ��:<font color=red>'.$return['error'].'</font>';
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
	$reset = $query->query("select * from ".T."sina_account where status = 1 ".$search.$my);
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