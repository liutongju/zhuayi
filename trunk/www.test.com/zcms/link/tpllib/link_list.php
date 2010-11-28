<?php
/*---------╡ывВхуж╬-------*/
function link_list($atts)
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
	if (!empty($url))
	{
		$search .= " and a.url like '%".$url."%'";
	}
	if (!empty($default))
	{
		$search .= " and a.default = '".$default.$aid."'";
	}
	$search .= " order by a.id desc";
	$sql = "select a.* from ".T."link as a  ".$search."  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>