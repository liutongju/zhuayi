<?php
/**
 * admin_edit.php     ZCMS 后台淘宝客栏目选取
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 验证登录 */
verify_admin('admin_username');

$pagename = "淘宝客栏目选取";
/* 载入淘宝类 */
include_once ZCMS_ROOT.'/zcms/taobao/class/taobao.api.class.php';

if (empty($_REQUEST['parent_cid']))
$parent_cid = '0' ;
else
$parent_cid = $_REQUEST['parent_cid'];
$taobao = new taobao();
$taobao->cache = $parent_cid;

$taobao->method = 'taobao.itemcats.get';

$taobao->fields = 'cid,parent_cid,name,is_parent';
$taobao->_array = array(
						'parent_cid'=>$parent_cid 
						);
$reset = $taobao->_return();

if ($reset!==false)
{
	$reset = $reset['itemcats_get_response']['item_cats']['item_cat'];}

?>