<?php
/**
 * admin_edit.php     ZCMS ģ��������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */


$pagename = "ģ�鰲װ";
if (empty($_REQUEST['id']))
{
	showmsg('�������������Դ','-1');
}
else
{
	$info = $query->one_array("select * from ".T."module where id =".$_REQUEST['id']);
	$info['tables'] = explode(',',$info['tables']);
	/* ɾ�����ݱ� */
	foreach ($info['tables'] as $val)
	{
		$query->query("DROP TABLE IF EXISTS `".T.$val."`");
	}
	/* ɾ����̨�˵� */
	$query->delete("menu"," mid = ".$_REQUEST['id']);
	
	/* ����ģ��Ϊδ��װ */
	$query->query("update ".T."module set install = 0 where id =".$_REQUEST['id']);
	
	showmsg('ж�سɹ�..',ret_cookie('backurl'));
	exit;
}
?>