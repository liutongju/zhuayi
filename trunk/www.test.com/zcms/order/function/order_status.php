<?php
//-------订单状态返回函数

function order_status($status){
	if ($status == '0')
	return '已';
	else
	return '未';
}



?>