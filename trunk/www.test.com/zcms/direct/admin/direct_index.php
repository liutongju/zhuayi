<?php
/**
 * admin_index.php     ZCMS ֱͶ�б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 *///-------���÷���URL
set_cookie("backurl",GetCurUrl(),0);

//-------��֤��¼
verify_admin('admin_username');


$maxnum = $query->maxnum("select * from ".T."direct ");
?>