<?php
/**
 * admin_info.php     ZCMS �޸Ļ���ӹ���Ա
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */
if (!empty($_REQUEST['id']))
{
	$pagename = '�����ɫ�޸�';
	$info = $query->one_array("select * from ".T."admin_group where id ='".$_REQUEST['id']."'");
}
else
{
	$pagename = '�����ɫ���';
}
?>