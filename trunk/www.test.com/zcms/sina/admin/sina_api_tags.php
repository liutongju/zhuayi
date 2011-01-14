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

$tags3 = $query->arrays("select title from ".T."sina_tags order by rand() limit 0 , 5");
foreach ($tags3 as $val)
{
	$tags2[] = $val['title'];
}

$info['tags'] = $tags2;
$info['account_tags'] = explode(',',$info['account_tags']);

$tags = array_filter(str_replace($info['account_tags'],'',$info['tags']));
$tags = implode(' ',$tags);
if (empty($tags))
{
	exit('更新标签失败:没有需要更新的标签');
}
$return = $t->tags($tags);
if ($return == '1')
{
	$query->query("update ".T."sina_account set account_tags = concat(account_tags,'".implode(',',explode(' ',$tags))."') where id = ".$_REQUEST['id']);
	$return = '更新标签成功';
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