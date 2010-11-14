<?php
/*---------操作日志-------*/
function diyurl_list($atts)
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

	if (!empty($url))
	{
		$search .= " and a.url like '%".$url."%'";
	}
	$search .= " order by a.id desc";
	$sql = "select a.* from ".T."seo as a  ".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		if ($row['parameter'] == 1)
		{
			$row['parameter'] = '是';
		}
		else
		{
			$row['parameter'] = '否';
		}
		$list[] = $row;
	}
	return $list;
}
?>