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

	
$maxnum = $query->maxnum("select count(*) from ".T."admin as a where a.id >0 ".$search);
?>