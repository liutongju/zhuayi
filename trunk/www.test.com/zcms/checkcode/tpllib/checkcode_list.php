<?php
/*---------╡ывВхуж╬-------*/
function checkcode_list($atts)
{
	extract($atts, EXTR_OVERWRITE);
	//------
	global $query,$perpagenum,$weburl;
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
	$sql = "select * from ".T."checkcode as a  ".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		$rule = unserialize($row['rule']);
		$row['url'] = $weburl.'/index.php?m=checkcode&c=show';
		foreach ($rule as $key=>$val)
		{
			$row['url'] .= '&'.$key.'='.$val;
		}
		$list[] = $row;
	}
	return $list;
}
?>