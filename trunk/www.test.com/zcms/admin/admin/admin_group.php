<?php
/**
 * admin_info.php     ZCMS 修改或添加管理员
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */
//-------设置返回URL
set_cookie("backurl",GetCurUrl(),0);
$pagename = '管理角色';
$search = ' where a.id >0';
$maxnum= $query->maxnum("select count(*) from ".T."admin_group  as a  ".$search);



?>