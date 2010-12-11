<?php
/*---------文章栏目列表-------*/
function sms_task_list($atts)
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

	if (!empty($title))
	{
		$search .= " and a.title like '%".$title."%'";
	}

	$sql = "select a.* from ".T."sms_task as a".$search."  order by a.id desc limit $startnum , $limit";
	$list = $query->arrays($sql);
	return $list;
}
?>