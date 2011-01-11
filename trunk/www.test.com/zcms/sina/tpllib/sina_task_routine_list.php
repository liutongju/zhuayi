<?php
/*---------╡ывВхуж╬-------*/
function sina_task_routine_list($atts)
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

	if (!empty($title))
	{
		$search .= " and a.title like '%".$title."%'";
	}

	$search .= $my." order by a.id desc";
	$sql = "select * from ".T."sina_task_routine as a   ".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{

		$list[] = $row;
	}
	return $list;
}
?>