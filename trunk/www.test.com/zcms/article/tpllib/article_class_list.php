<?php
/*---------������Ŀ�б�-------*/
function article_class_list($atts)
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
	$sql = "select a.*,b.url from ".T."article_class as a left join ".T."seo as b on a.id = b.aid and b.tables='article_class'".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		if (empty($row['url']))
		$row['url'] = article_class_url($row['id']);
		$list[] = $row;
	}
	return $list;
}
?>