<?php
/**
 * admin_index.php     ZCMS 后台菜单列表
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* 设置返回URL */
set_cookie("backurl",GetCurUrl(),0);

if ($_REQUEST['parent_id'] !=''){	$search .= " and a.parent_id = '".$_REQUEST['parent_id']."'";}else{	$search .= " and a.parent_id = '0'";}
	
$maxnum = $query->maxnum("select count(*) from ".T."linkage as a where a.id >0 ".$search);
?>