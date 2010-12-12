<?php
/*---------╡ывВхуж╬-------*/
function search_list($atts)
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

	if (!empty($start))
	{
		$startnum = $start;
	}
	
	if (!empty($title))
	{
		$search .= " and a.title like '%".$title."%'";
	}
	if (!empty($tables))
	{
		$search .= " and a.tables = '".$tables."'";
	}
	if (!empty($orders))
	{
		$search .= " order by a.num desc";
	}
	else
	{
		$search .= " order by a.id desc";
	}
	$sql = "select a.* from ".T."search as a  ".$search."  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>