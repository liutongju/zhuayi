<?php
/*---------������־-------*/
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
			$row['cash'] = '֧��';
		}
		else
		{
			$row['cash'] = '��֧��';
		}
		$list[] = $row;
	}
	

	return $list;
}
?>