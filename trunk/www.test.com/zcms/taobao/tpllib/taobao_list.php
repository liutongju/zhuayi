<?php
/*---------文章栏目列表-------*/
function taobao_list($atts)
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

	if (!empty($cid))
	{
		$search .= " and  a.cid = ".$cid."";
	}
	
	
	$search .= " order by a.id desc";
	$sql = "select a.*,b.url,c.classname,catdir,d.url as classurl from ".T."taobao as a left join ".T."seo as b on a.id = b.aid and b.tables='taobao' left join ".T."taobao_class as c on a.cid = c.id left join ".T."seo as d on c.id = d.aid and d.tables = 'taobao_class'".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	//echo $sql;
	while ($row = $query->fetch_array($reset))
	{
		
		$list[] = $row;
	}
	return $list;
}
?>