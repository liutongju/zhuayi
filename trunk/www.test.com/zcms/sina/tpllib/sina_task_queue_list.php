<?php
/*---------操作日志-------*/
function sina_task_queue_list($atts)
{
	extract($atts, EXTR_OVERWRITE);
	//------
	global $query,$perpagenum,$my;
	if (!isset($limit))
	{
		$limit = $perpagenum;
	}
	if (empty($page))
	{
		$page = 1;
		$startnum = 0 ;
	}
	else
	$startnum =  ($page-1)*$limit;
	$search = ' where a.id >0';

	if (!empty($_REQUEST['username']))
	{
		$search .= " and a.uid in (select id from ".T."sina_account where username like '%".urldecode($_REQUEST['username'])."%')";
	}
	if (!empty($_REQUEST['title']))
	{
		$search .= " and a.title like '%".urldecode($_REQUEST['title'])."%'";
	}
	if ($_REQUEST['status'] == 1)
	{
		$search .= " and a.reset like '%成功%'";
	}
	elseif ($_REQUEST['status'] == '2')
	{
		$search .= " and a.reset not like '%成功%'";
	}
	$search .= $my." order by a.id desc";
	$sql = "select a.*,b.username from ".T."sina_task_queue as a left join ".T."sina_account as b on a.uid = b.id  ".$search."  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>