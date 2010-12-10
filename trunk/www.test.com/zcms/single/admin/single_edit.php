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
/* 验证登录 */
verify_admin('admin_username');
if (!empty($_REQUEST['id']))
{
	$pagename = "单页面编辑";
	$info = $query->one_array("select * from ".T."single where id =".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='single' and aid=".$_REQUEST['id']);
}
else
{
	$pagename = "单页面添加";
}
//-------载入地图中的数据源
include_once ZCMS_ROOT.'/zcms/sitemaps/include/sitemaps_config.php';
$dbsource = explode('|',$dbsource);
$tpls = array();

foreach ($dbsource as $val)
{
	$array = handie(ZCMS_ROOT.'/zcms/'.$val.'/template/down',1);
	if (!empty($array))
	$tpls += $array;
}

?>