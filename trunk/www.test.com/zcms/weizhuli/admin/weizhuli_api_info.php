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

if (empty($_REQUEST['id']))
{
	$pagename = '���΢��API';
	$_POST['dtime'] = time();
	$_POST['id'] = $query->save("weizhuli_api",$_POST);
}
else
{
	$pagename = '�޸�΢��API';
	$query->save("weizhuli_api",$_POST,' id = '.$_POST['id']);

}
/* д����־ */
admin_log("weizhuli_api",$_POST['id'],'api_name',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>