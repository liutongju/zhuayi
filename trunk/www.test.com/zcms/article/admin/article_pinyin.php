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
//-------验证登录
verify_admin('admin_username');
$info = $query->one_array("select * from ".T."article_class where id ='".$_REQUEST['parent_id']."'");

if (!empty($info['catdir']))
$info['catdir'] = $info['catdir'];
else
$info['catdir'] = $article_index_path;
echo $info['catdir'].pinyin(urldecode($_REQUEST['title'])).'/';
exit;
?>