<?php
/*---------������־-------*/
function weizhuli_api_list($atts)
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
	$sql = "select a.* from ".T."weizhuli_api as a  ".$search."  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>