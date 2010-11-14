<?php
/*---------后台菜单模版标签-------*/
function direct_list($atts)
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
	if (!empty($product_num))
	{
		$search .= " and a.product_num like '%".$product_num."%'";
	}

	$sql = "select a.*,b.url  from ".T."direct  as a left join ".T."seo as b on a.id = b.aid and b.tables='direct' ".$search." order by product_num desc  limit $startnum , $limit";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		if (empty($row['url']))
		$row['url'] = direct_url($row['id']);
		$list[] = $row;
	}
	return $list;
}
?>