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

if (!empty($_REQUEST['id']))
{
	$pagename = "�ӿڱ༭";
	$info = $query->one_array("select * from ".T."weizhuli_api where id =".$_REQUEST['id']);
}
else
{
	$pagename = "�ӿ����";
}


?>