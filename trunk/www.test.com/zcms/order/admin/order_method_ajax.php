<?php
/**
 * admin_edit.php     ZCMS 更改配送方式和发货号码
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']))
{
	exit('数据错误,请联系管理员..');
}

$info = $query->one_array("select * from ".T."order where id =".$_REQUEST['id']);
//-------判断是否为确定订单
if ($info['order_status']!=0)
{
	exit('<h2 style="color:red;line-height:180%;">订单不是确定状态..不能发货</h2>');
}
//-------判断是否为确定订单
if ($info['recycle']==1)
{
	exit('<h2 style="color:red;line-height:180%;">订单在回收站中..不能发货</h2>');
}
?>