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
set_cookie("backurl",GetCurUrl(),0);

if ($_REQUEST['parent_id'] !='')
	
$maxnum = $query->maxnum("select count(*) from ".T."linkage as a where a.id >0 ".$search);
?>