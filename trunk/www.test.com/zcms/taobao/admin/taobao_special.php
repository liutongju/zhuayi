<?php
/**
 * admin_index.php     ZCMS �Ա�����Ʒ�б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 *///-------��֤��¼
verify_admin('admin_username');
//-------���÷���URL
set_cookie("backurl",GetCurUrl(),0);

if (!empty($_REQUEST['title'])){	$search .= " and a.title like '%".$_REQUEST['title']."%'";}


	
if (!empty($_REQUEST['cid']))
{
	$search .= " and a.cid = '".$_REQUEST['cid']."'";
}
else
{
	$_REQUEST['cid'] = 0;
}
$maxnum = $query->maxnum("select count(*) from ".T."taobao_special as a where a.id > 0 ".$search);

//------���뻺��include_once ZCMS_CACHE.'taobao_class_cache.php';$classlist = unserialize($taobao_class_cache);
?>