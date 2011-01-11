<?php
/**
 * index.php     ZCMS 入口文件
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */


if ($_REQUEST['act']==1)
{
	$time = date("G:i:s");

	$info = $query->one_array("select a.*,b.uid as sid from ".T."sina_task_account as a left join ".T."sina_account as b on a.uid = b.id where  (starttime = '".$time."' and  `set` = 'day') or ( `set` = 'month' and  ".date("d")." in (day) and starttime = '".$time."' ) or ( starttime = '".$time."' and `set` = 'week' and  ".date("w")." in (week)) order by rand() limit 0 ,1");
	$info['fields'] = unserialize($info['fields']);
	//echo '<pre>';
	foreach ($info['fields'] as $key=>$val)
	{
		$lian .= $key.'='.$val.'&';
	}
	$urls = $info['task'].'&'.$lian.'id='.$info['uid'];
	if ($urls!='' && $info['uid']!='')
	{
		echo json_encode(array('url'=>$urls,'id'=>$info['id'],'time'=>$time));
	}
	else
	{
		echo json_encode(array('url'=>'','id'=>'','time'=>$time));
	}
	exit;
}
elseif ($_REQUEST['act'] == 2)
{
	$query->query("update ".T."sina_task_account set num = num+1 ,endtime = '".time()."' , reset = '".siconv($_POST['reset'])."' where id =".$_POST['id']);
	exit;
}
else
{

}


?>