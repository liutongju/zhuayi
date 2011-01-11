<?php
/*---------������־-------*/
function sina_account_list($atts)
{
	extract($atts, EXTR_OVERWRITE);
	//------
	global $query,$perpagenum,$my;
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
		$search .= " and concat(a.username,a.nick) like '%".$username."%'";
	}

	if (!empty($cid))
	{
		$search .= " and a.cid = '".$cid."'";
	}

	if ($status!='')
	{
		$search .= " and a.status = '".$status."'";
	}

	if ($litpic == '1')
	{
		$search .= " and a.litpic <> ''";
	}
	elseif ($litpic == '0')
	{
		$search .= " and a.litpic = ''";
	}

	if ($login == '1')
	{
		$search .= " and a.cookie <> ''";
	}
	elseif ($login == '0')
	{
		$search .= " and a.cookie = ''";
	}

	$search .= $my." order by a.id desc";
	$sql = "select a.*,b.classname from ".T."sina_account as a left join ".T."sina_account_class as b on a.cid = b. id  ".$search."  limit $startnum , $limit";
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		if ($row['status'] == 0)
		{
			$row['status'] = '<font color=red>δ����</font>';
		}
		else
		{
			$row['status'] = '<font color=#009900>�Ѽ���</font>';
		}
		if (empty($row['litpic']))
		{
			$row['litpic2'] = '<font color=red>��ͷ��</font>';
		}
		else
		{
			$row['litpic2'] = '<font color=#009900>��ͷ��</font>';
		}
		if (empty($row['cookie']))
		{
			$row['login'] = '<font color=red>δ��¼</font>';
		}
		else
		{
			$row['login'] = '<font color=#009900>�ѵ�¼</font>';
		}
		$list[] = $row;
	}
	return $list;
}
?>