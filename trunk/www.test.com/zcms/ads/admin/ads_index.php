<?php
/**
 * admin_edit.php     ZCMS 后台菜单添加、编辑
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

set_cookie("backurl",GetCurUrl(),0);
$pagename = '广告管理';
$maxnum = $query->maxnum("select count(*) from ".T."ads ");
?>