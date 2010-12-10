<?php
/*---------²Ù×÷ÈÕÖ¾-------*/
function single_list($atts)
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
	if ($parent_id !='')
	{
		$search .= " and a.parent_id = ".$parent_id;
	}
	if ($noid !='')
	{
		$search .= " and a.id <> ".$noid;
	}
	$search .= " order by a.parent_id asc";
	$sql = "select a.*,b.url from ".T."single as a left join ".T."seo as b on a.id=b.aid and b.tables = 'single' ".$search."  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>