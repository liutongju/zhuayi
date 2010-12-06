<?php
/*---------连接列表-------*/
function admin_list($atts)
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
		$search .= " and a.username like '%".$username."%'";
	}
	if (!empty($gid))
	{
		$search .= " and a.gid  =".$gid;
	}
	
	$sql = "select a.*,b.groupname from ".T."admin  as a  left join ".T."admin_group as b on a.gid = b.id ".$search." order by id desc  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>