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
	$pagename = '���΢��������Ŀ';
	$_POST['dtime'] = time();
	$class = $query->one_array("select id from ".T."sina_content_class where classname = '".$_POST['classname']."'");
	if(!$class['id']){
		$_POST['id'] = $query->save("sina_content_class",$_POST);
	}
}
else
{
	$pagename = '�޸�΢��������Ŀ';
	$query->save("sina_content_class",$_POST,' id = '.$_POST['id']);
	
}
/* д����־ */
admin_log("sina_content_class",$_POST['id'],'΢��������Ŀ',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>