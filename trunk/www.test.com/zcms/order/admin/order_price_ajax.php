<?php
/**
 * admin_edit.php     ZCMS �������ͷ�ʽ�ͷ�������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']))
{
	exit('���ݴ���,����ϵ����Ա..');
}

$info = $query->one_array("select * from ".T."order where id =".$_REQUEST['id']);
?>