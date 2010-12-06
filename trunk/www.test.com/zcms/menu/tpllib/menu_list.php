<?php
/*---------后台菜单模版标签-------*/
function menu_list($atts)
{
	extract($atts, EXTR_OVERWRITE);
	/* 屏蔽一般错误 */
	error_reporting(E_ALL^E_NOTICE^E_WARNING);
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
	if ($parent_id=='0' || !empty($parent_id))
	{
		$search .= " and a.parent_id =".$parent_id;
	}
	if (!empty($title))
	{
		$search .= " and a.title like '%".$title."%'";
	}
	if ($id!='')
	{
		$search .= " and a.id in (".$id.")";
	}

	$sql = "select a.*,b.title as p_title from ".T."menu  as a  left join ".T."menu as b on a.parent_id = b.id ".$search." order by orders asc  limit $startnum , $limit";
	$list = $query->arrays($sql);
	return $list;
}
?>