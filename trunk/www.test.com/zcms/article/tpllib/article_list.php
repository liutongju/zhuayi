<?php
/*---------文章栏目列表-------*/
function article_list($atts)
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
	
	if (!empty($related))
	{
		$search .= " and a.title regexp '".$related."'";
	}
	
	if (!empty($flag))
	{
		$search .= " and a.flag regexp '".$flag."'";
	}
	
	if (!empty($cid))
	{
		$search .= " and  a.cid = ".$cid."";
	}
	
	if (!empty($litpic))
	{
		$search .= " and  a.litpic <>''";
	}
	
	$search .= " order by a.id desc";
	$sql = "select a.*,b.url,c.classname,d.url as classurl from ".T."article as a left join ".T."seo as b on a.id = b.aid and b.tables='article' left join ".T."article_class as c on a.cid = c.id left join ".T."seo as d on c.id = d.aid and d.tables = 'article_class'".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	//echo $sql;
	while ($row = $query->fetch_array($reset))
	{
		if (empty($row['url']))
		$row['url'] = article_url($row['id']);
		
		if (!empty($strlen))
		{
			$row['title'] = strlens($row['title'],0,$strlen);
		}
		$list[] = $row;
	}
	return $list;
}
?>