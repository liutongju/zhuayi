<?php
/**
 * admin_edit.php     ZCMS ��̨�˵���ӡ��༭
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* ��֤��¼ */
verify_admin('admin_username');
if (!empty($_REQUEST['id']))
{
	$pagename = "��ҳ��༭";
	$info = $query->one_array("select * from ".T."single where id =".$_REQUEST['id']);
	$seo = $query->one_array("select * from ".T."seo where tables ='single' and aid=".$_REQUEST['id']);
}
else
{
	$pagename = "��ҳ�����";
}
//-------�����ͼ�е�����Դ
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