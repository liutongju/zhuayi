<?php
/*---------文章栏目列表-------*/
function sms_list($atts)
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
		$search .= " and concat(a.sms,a.username) like '%".$username."%'";
	}
	if (!empty($cid))
	{
		$search .= " and a.cid =".$cid;
	}
	$sql = "select a.*,b.classname from ".T."sms as a left join ".T."sms_class as b on a.cid=b.id".$search."  order by a.id desc limit $startnum , $limit";
	$list = $query->arrays($sql);
	return $list;
}
?>