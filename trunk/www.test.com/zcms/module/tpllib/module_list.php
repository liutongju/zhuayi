<?php
/*---------������־-------*/
function module_list($atts)
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
	$sql = "select a.* from ".T."module as a  ".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		if ($row['type'] == 0)
		{
			$row['type'] = 'ģ��';
		}
		else
		{
			$row['type'] = '���';
		}
		
		if ($row['install'] == 0)
		{
			$row['install'] = '<a href="/index.php?m=module&c=install&a=init&id='.$row['id'].'">��װ</a>';
		}
		else
		{
			$row['install'] = '<a href="/index.php?m=module&c=uninst&a=init&id='.$row['id'].'">ж��</a>';
		}
		if ($row['dtime'] == 0)
		{
			$row['dtime'] = '----';
		}
		else
		{
			$row['dtime'] = dtime($row['dtime']);
		}
		$list[] = $row;
	}
	return $list;
}
?>