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
if (empty($_POST['share']))
{
	$_POST['share'] = 0;
}
if (empty($_POST['id']) && !is_array($_POST['orders']))
{
	$pagename = '��ӷ���';
	$_POST['id'] = $query->save("record_class",$_POST);
}
else
{
	$pagename = '�༭����';
	if (is_array($_POST['orders']))
	{
		$pagename = '����˵�';
		foreach ($_POST['id'] as $key=>$value)
		{
			$order['orders'] = $_POST['orders'][$key];
			$query->save("record_class",$order,' id='.$value);
		}
	}
	else
	{
		$query->save("record_class",$_POST,' id = '.$_POST['id']);
	}
	
}
/* д����־ */
admin_log("record_class",$_POST['id'],'classname',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>