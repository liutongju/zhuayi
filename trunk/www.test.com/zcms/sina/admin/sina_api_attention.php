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

include 'api_global.php';

/* ��ʼ��ע */
$reset = $query->query("select uid from ".T."sina_account where uid<>'' and id <>".$_REQUEST['id']." order by rand() limit 0 ,".rand(20,30));
while ($row = $query->fetch_array($reset))
{
	$uid[] = $row['uid'];
}
$info['gid'] = implode(',',$uid);

$return = $t->attention($info['gid'],$info['uid']);

if ($return == '1')
{
	$uid = explode(',',$info['gid']);
	foreach ($uid as $val)
	{
		$query->query("insert into ".T."sina_attention (myid,uid)values('".$_REQUEST['id']."','".$val."')");
	}
	/* ���ĳ�ʼ��ע״̬ */
	$query->query("update ".T."sina_account set start_attention where id =".$_REQUEST['id']);
	echo '��ע�ɹ�';
}
else
{
	echo $return['error'];
}
exit;

?>