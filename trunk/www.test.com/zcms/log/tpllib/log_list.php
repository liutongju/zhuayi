<?php
/*---------²Ù×÷ÈÕÖ¾-------*/
function log_list($atts)
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

	if (!empty($username))
	{
		$search .= " and a.userid = (select id from ".T."admin where username like '%".$username."%')";
	}
	if (!empty($start_time))
	{
		$search .= " and a.dtime > ".strtotime($start_time);
	}
	if (!empty($end_time))
	{
		$search .= " and a.dtime < ".strtotime($end_time);
	}
	$search .= " order by a.id desc";
	$sql = "select a.*,b.username from ".T."log as a left join ".T."admin as b on a.userid = b.id  ".$search."  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>