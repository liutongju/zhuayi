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

include 'api_global.php';

/* 初始关注 */
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
	/* 更改初始关注状态 */
	$query->query("update ".T."sina_account set start_attention = 1 where id =".$_REQUEST['id']);
	$return = '关注成功';
}
else
{
	$return =  $return['error'];
}

/* 更新任务 和返回值 时间 */
$query->query("update ".T."sina_task_queue set reset = '".$return."' , dtime =".time()." where id=".$_REQUEST['taskid']);

$query->query("update ".T."sina_account set task_time = '".time()."' where id =".$_REQUEST['id']);

echo $return;
exit;

?>