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

if (!empty($_REQUEST['username'])){	$search .= " and a.userid = (select id from ".T."admin where username like '%".$_REQUEST['username']."%')";}if (!empty($_REQUEST['start_time'])){	$search .= " and a.dtime > ".strtotime($_REQUEST['start_time']);}if (!empty($_REQUEST['end_time'])){	$search .= " and a.dtime < ".strtotime($_REQUEST['end_time']);}
	
$maxnum = $query->maxnum("select count(*) from ".T."log as a where a.id >0 ".$search);
?>