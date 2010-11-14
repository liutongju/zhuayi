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
?>