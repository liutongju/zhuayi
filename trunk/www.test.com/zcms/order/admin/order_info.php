<?php
/**
 * admin_info.php     ZCMS 订单添加
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

foreach ($_POST['product'] as $key=>$val)
{
	$_POST['total'] += $val['price']*$_POST['product'][$key]['num'];
}
$_POST['price'] = $_POST['total'];
$_POST['consignee'] = serialize($_POST['consignee']);
$_POST['product'] = serialize($_POST['product']);
$_POST['order_status'] = 0;
$_POST['dtime'] = time();
$_POST['source'] = '本站后台';
$_POST['recycle'] = 0;
$_POST['oid'] = $query->save('order',$_POST);

$_POST['uid'] = ret_cookie('admin_userid');$_POST['log'] = '添加订单';$query->save("order_log",$_POST);	
//---------写入日志
admin_log("order",$_POST['oid'],'order_num','添加订单');
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>