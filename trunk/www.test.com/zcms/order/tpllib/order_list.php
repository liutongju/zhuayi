<?php
/*---------²Ù×÷ÈÕÖ¾-------*/
function order_list($atts)
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

	if (!empty($purchaser))
	{
		$search .= " and a.purchaser like '%".$purchaser."%'";
	}
	
	if (!empty($order_num))
	{
		$search .= " and a.order_num = '".$order_num."'";
	}
	

	if (!empty($start_time))
	{
		$search .= " and a.dtime > ".strtotime($start_time);
	}
	if (!empty($end_time))
	{
		$search .= " and a.dtime < ".strtotime($end_time);
	}
	
	if ($recycle!='')
	{
		$search .= " and a.recycle = ".$recycle;
	}
	
	$search .= " order by a.id desc";
	$sql = "select a.*from ".T."order as a   ".$search."  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>