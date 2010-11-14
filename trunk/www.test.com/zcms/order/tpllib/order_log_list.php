<?php
/*---------╡ывВхуж╬-------*/
function order_log_list($atts)
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

	if (!empty($oid))
	{
		$search .= " and a.oid like '%".$oid."%'";
	}
	
	$search .= " order by a.id desc";
	$sql = "select a.* ,b.username from ".T."order_log as a left join ".T."admin as b on a.uid = b.id ".$search."  limit $startnum , $limit";
	$list = $query->arrays($sql);
	return $list;
}
?>