<?php
/*----------�û��б�-------*/
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
			$row['type'] = '���ֹ��';
			break;
			case "2";
			$row['type'] = 'ͼƬ���';
			break;
			case "3";
			$row['type'] = 'Flash���';
			break;
			case "4";
			$row['type'] = '������';
			break;
		}
		$row['dtime'] = date('Y-m-d G:i:s',$row['dtime']);
		$list[] = $row;
	}
	return $list;
}
?>