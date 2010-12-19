<?php
/*---------连接列表-------*/
function record_list($atts)
{
	extract($atts, EXTR_OVERWRITE);
	//------
	global $query;
	$perpagenum = $GLOBALS['zcms_config']['perpagenum'];
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
	if (!empty($cid))
	{
		$search .= " and a.cid=".$cid;
	}
	if (!empty($title))
	{
		$search .= " and a.title like '%".$title."%'";
	}
	if (!empty($username))
	{
		$search .= " and a.uid = (select id from ".T."admin where username like '%".$username."%')";
	}
	$sql = "select a.*,b.classname,c.username from ".T."record  as a  left join ".T."record_class as b on a.cid = b.id left join ".T."admin as c on a.uid=c.id ".$search." order by a.id desc  limit $startnum , $limit";
	$list = $query->arrays($sql);

	return $list;
}
?>