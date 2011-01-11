<?php
/*---------╡ывВхуж╬-------*/
function sina_task_account($atts)
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

	if (!empty($uid))
	{
		$search .= " and a.uid = '".$uid."'";
	}



	$search .= " order by a.id desc";
	$sql = "select a.* from ".T."sina_task_account as a   ".$search."  limit $startnum , $limit";
	return $query->arrays($sql);

}
?>