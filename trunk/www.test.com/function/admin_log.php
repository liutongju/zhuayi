<?php
function admin_log($table,$id,$fields,$action,$cookieid='')
{
	global $query,$admin_log;
	//--------�رպ�̨��־
	if ($admin_log == 0)
	{
		return false;
	}
	//------����SQL����
	$query->error = true;
	if (is_array($id))
	{
		$id = implode(',',$id);
	}
	if (empty($cookieid))
	{
		$cookieid = ret_cookie('admin_userid');
	}
	$reset = $query->query("select ".$fields." as title from ".T.$table." where id in(".$id.")");
	while ($row = $query->fetch_array($reset))
	{
		$list[] = $row['title'];
	}
	$log['log'] = $action.' <font color=#009900>[ table:'.$table.';id:('.$id.');title:('.implode(',',$list).') ]</font>';;
	$log['userid'] = $cookieid;
	$log['ip'] = get_ip();
	$log['dtime'] = time();
	$query->save("log",$log);
}
?>