<?php
/*---------连接列表-------*/
function admin_group_list($atts)
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

	if (!empty($groupname))
	{
		$search .= " and a.groupname like '%".$groupname."%'";
	}
	
	$sql = "select a.* from ".T."admin_group  as a   ".$search." order by id desc  limit $startnum , $limit";
	//echo $sql;
	$list = $query->arrays($sql);

	return $list;
}
?>