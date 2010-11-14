<?php
/**
 * admin_index.php     ZCMS 订单列表
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 *///-------设置返回URL
set_cookie("backurl",GetCurUrl(),0);

$search = ' where a.id >0';

if (!empty($_REQUEST['purchaser'])){	$search .= " and a.purchaser like '%".$_REQUEST['purchaser']."%'";}
	if (!empty($_REQUEST['order_num']))
{
	$search .= " and a.order_num like '%".$_REQUEST['order_num']."%'";
}

if (!empty($_REQUEST['start_time']))
{
	$search .= " and a.dtime > ".strtotime($_REQUEST['start_time']);
}
if (!empty($_REQUEST['end_time']))
{
	$search .= " and a.dtime < ".strtotime($_REQUEST['end_time']);
}

if ($_REQUEST['recycle']!=''){	$search .= " and a.recycle = ".$_REQUEST['recycle'];}
	
$maxnum = $query->maxnum("select * from ".T."order as a ".$search);
?>