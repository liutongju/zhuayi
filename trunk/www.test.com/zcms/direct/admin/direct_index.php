<?php
/**
 * admin_index.php     ZCMS 直投列表
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 *///-------设置返回URL
set_cookie("backurl",GetCurUrl(),0);

//-------验证登录
verify_admin('admin_username');


$maxnum = $query->maxnum("select * from ".T."direct ");
?>