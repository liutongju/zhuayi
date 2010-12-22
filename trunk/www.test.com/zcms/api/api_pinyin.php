<?php
/**
 * admin_edit.php     ZCMS 后台转换拼音
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */
/* 验证登录 */
verify_admin('admin_username');
echo pinyin(urldecode($_REQUEST['title']));
exit;
?>