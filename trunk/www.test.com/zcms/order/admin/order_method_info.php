<?php
/**
 * admin_info.php     ZCMS ���ͷ�ʽ������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '������ͷ�ʽ';
	$_POST['id'] = $query->save("order_method",$_POST);
}
else
{
	$pagename = '�޸����ͷ�ʽ';
	$query->save("order_method",$_POST,' id = '.$_POST['id']);
	
}
//---------д����־
admin_log("order_method",$_POST['id'],'title',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>