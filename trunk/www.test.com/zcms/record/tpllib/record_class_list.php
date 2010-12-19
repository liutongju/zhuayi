<?php
/*---------连接列表-------*/
function record_class_list($atts)
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


	$sql = "select a.*,b.username,(select count(*) from ".T."record where cid=a.id) as record_num from ".T."record_class as a  left join ".T."admin as b on a.uid = b.id  ".$search."  order by a.id desc  limit $startnum , $limit";
	$list = $query->arrays($sql);
	return $list;
}
?>