<?php
/*---------操作日志-------*/
function weizhuli_task_list($atts)
{
	extract($atts, EXTR_OVERWRITE);
	//------
	global $query,$perpagenum;
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


	$search .= " order by a.id desc";
	$sql = "select a.*,b.username from ".T."weizhuli_task as a left join ".T."admin as b on a.uid = b.id ".$search."  limit $startnum , $limit";
	$reset =$query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		if ($row['status'] == 0)
		$row['status'] = '未发布';
		else
		$row['status'] = '已发布';

		$list[] = $row;
	}

	return $list;
}
?>