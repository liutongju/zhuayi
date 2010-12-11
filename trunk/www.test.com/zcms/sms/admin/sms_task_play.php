<?php
/**
 * admin_edit.php     ZCMS 后台文章编辑、添加
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */


if ($_REQUEST['play'] != 1)
{
	if (empty($_REQUEST['id']))
	{
		showmsg('我不知道你要发那个任务的短信哦',-1);
	}

	/* 查询任务 */
	$info = $query->one_array("select * from ".T."sms_task where id=".$_REQUEST['id']);
	/* 判断是否分类 */
	if (strpos('%'.$info['sms'],'<!cid')<=0)
	{
		showmsg('错误的收件人',-1);
	}

	$info['sms'] = str_replace('<!cid,','',$info['sms']);
	$info['sms'] = str_replace('>','',$info['sms']);
	/* 根据栏目ID读取号码 */
	$reset = $query->query("select sms,username from ".T."sms where cid in (".$info['sms'].")");
	while ($row = $query->fetch_array($reset))
	{
		$sms_num[] = $row['sms'];
		$username[] = $row['username'];
	}
	$sms_num =  '"'.implode("\",\"",$sms_num).'"';
	$username =  '"'.implode("\",\"",$username).'"';
	/* 清空以前的统计 */
	$query->query("update ".T."sms_task set `ok` = 0,`error` = 0 where id=".$_REQUEST['id']);
	
	/* 总数 */
	$toll = ceil(strlen($info['body'])/120);
	
}
else
{
	$reset = 0;
	/* 更新状态 */
	if ($reset == 0)
	{
		$query->query("update ".T."sms_task set ok = ok+1 where id=".$_REQUEST['id']);
		$query->query("update ".T."sms_statistics set sms_num=sms_num+".$_REQUEST['toll']);
	}
	else
	{
		$query->query("update ".T."sms_task set error = error+1 where id=".$_REQUEST['id']);
	}
	echo $reset;
	
	exit;
}
?>