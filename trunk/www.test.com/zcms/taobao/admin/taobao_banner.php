<?php
/**
 * admin_edit.php     ZCMS 后台商品编辑、添加
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 验证登录 */
verify_admin('admin_username');

/* 获取banner模版 */

$file = handie(ZCMS_ROOT.'/zcms/taobao/template/banner_tpl',1);

?>