<?php
/**
 * admin_edit.php     ZCMS 更改订单价格
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_POST['id']))
{
	exit('数据错误,请联系管理员..');
}
//------更新订单配送方式和发货号码
$query->query("update ".T."order set price='".$_POST['price']."'where id =".$_POST['id']);

$query->query("insert into ".T."order_log(oid,log,uid,dtime)values('".$_POST['id']."','修改订单价格----￥".$_POST['price']."元','".ret_cookie('admin_userid')."','".time()."')");
echo '1';
exit;
?>