<?php
/**
 * admin_index.php     ZCMS 后台管理面板
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 查询当前登录管理员信息 */
$info = $query->one_array("select a.*,b.* from ".T."admin as a left join ".T."admin_group as b on a.gid=b.id where a.username ='".ret_cookie('admin_username')."'");
?>