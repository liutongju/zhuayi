<?php
/**
 * admin_index.php     ZCMS ��̨�Զ���URL�б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* ���÷���URL */
set_cookie("backurl",GetCurUrl(),0);

if ($_REQUEST['url'] !='')
{
	$search .= " and a.url = '".$_REQUEST['url']."'";
}
	
$maxnum = $query->maxnum("select count(*) from ".T."seo as a where a.id >0 ".$search);
?>