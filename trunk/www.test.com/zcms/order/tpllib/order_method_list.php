<?php
/*---------操作日志-------*/
function order_method_list($atts)
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
	$sql = "select a.*from ".T."order_method as a  ".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		if ($row['cash'] == 0)
		{
			$row['cash'] = '支持';
		}
		else
		{
			$row['cash'] = '不支持';
		}
		$list[] = $row;
	}
	

	return $list;
}
?>