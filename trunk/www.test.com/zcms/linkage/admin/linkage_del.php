<?php
/**
 * admin_del.php     ZCMS ��̨�˵�ɾ��
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* �ж���·ID�Ƿ���� */
if (empty($_REQUEST['id']))
{
	showmsg('��û��ָ��Ҫɾ���ĸ��˵�..',-1);
}
else
{
	/* ��ѯȫ������ */
	$array = $query->arrays("select * from ".T."linkage");
	$tree = tree($array,'parent_id',$_REQUEST['id']);
	foreach ($tree as $val)
	{
		$id[] = $val['id'];
	}
	$id = implode(',',$id);
	if (!empty($id))
	$query->delete("linkage"," id in (".$id.")");
	/* -д����־ */
	admin_log("linkage",$_REQUEST['id'],'title','ɾ����̨�˵�');

	$query->delete("linkage"," id =".$_REQUEST['id']);
		
	showmsg('ɾ���ɹ�..',ret_cookie('backurl'));
	
}exit;
?>