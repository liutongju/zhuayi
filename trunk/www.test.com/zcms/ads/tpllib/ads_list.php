<?php
/*----------用户列表-------*/
function ads_list($atts)
{
	extract($atts, EXTR_OVERWRITE);
	
	//------
	global $query;
	$sql = "select * from ".T."ads order by id desc ";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		switch ($row['type'])
		{
			case "1";
			$row['type'] = '文字广告';
			break;
			case "2";
			$row['type'] = '图片广告';
			break;
			case "3";
			$row['type'] = 'Flash广告';
			break;
			case "4";
			$row['type'] = '代码广告';
			break;
		}
		$row['dtime'] = date('Y-m-d G:i:s',$row['dtime']);
		$list[] = $row;
	}
	return $list;
}
?>