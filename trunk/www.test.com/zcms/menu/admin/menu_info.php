<?php
/**
 * admin_info.php     ZCMS ��̨�˵�������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '��Ӳ˵�';
	$_POST['id'] = $query->save("menu",$_POST);
}
else
{
	$pagename = '�޸Ĳ˵�';
	if (is_array($_REQUEST['orders']))
	{
		$pagename = '����˵�';
		foreach ($_REQUEST['id'] as $key=>$value)
		{
			$order['orders'] = $_POST['orders'][$key];
			$query->save("menu",$order,' id='.$value);
		}
	}
	else
	{
		$query->save("menu",$_POST,' id = '.$_POST['id']);
	}
	
}
/* д����־ */
admin_log("menu",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>