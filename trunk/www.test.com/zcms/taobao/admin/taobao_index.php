<?php
/**
 * admin_index.php     ZCMS �Ա�����Ʒ�б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
verify_admin('admin_username');

set_cookie("backurl",GetCurUrl(),0);

if (!empty($_REQUEST['title']))


	
if (!empty($_REQUEST['cid']))
{
	$search .= " and a.cid = '".$_REQUEST['cid']."'";
}
else
{
	$_REQUEST['cid'] = 0;
}
$maxnum = $query->maxnum("select count(*) from ".T."taobao as a where a.id > 0 ".$search);

//------���뻺��
?>