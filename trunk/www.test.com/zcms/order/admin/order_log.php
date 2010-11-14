<?php
/**
 * admin_info.php     ZCMS 配送方式入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (!empty($_REQUEST['oid']))
{
	if ($_POST['act']!='')
	{
		if ($_POST['act'] == 'fk_status')
		$fk = ',fktime ='.time();

		$query->query("update ".T."order set ".$_POST['act']." =".$_POST['val'].$fk." where id =".$_POST['oid']);
	}
	$_POST['uid'] = ret_cookie('admin_userid');
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("order_log",$_POST);	
}
else
{
	showmsg('数据错误..','/index.php?m=order&c=show&a=init&id='.$_REQUEST['oid']);
}
//---------写入日志
admin_log("order_log",$_POST['id'],'log','订单操作');
showmsg('恭喜您,操作成功','/index.php?m=order&c=show&a=init&id='.$_REQUEST['oid']);
?>