<?php
/**
 * admin_index.php     ZCMS ��̨�˵��б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* ���÷���URL */
set_cookie("backurl",GetCurUrl(),0);

if (!empty($_REQUEST['username']))
{
	$search .= " and concat(a.username,a.sms) like '%".$_REQUEST['title']."%'";
}

$maxnum = $query->maxnum("select count(*) from ".T."sms as a where a.id > 0 ".$search);

?>