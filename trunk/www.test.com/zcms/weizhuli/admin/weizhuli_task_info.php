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
$_POST['timeing'] = strtotime($_POST['timeing']);
if (empty($_REQUEST['id']))
{
	$pagename = '�������';

	$_POST['id'] = $query->save("weizhuli_task",$_POST);
}
else
{
	$pagename = '�޸�����';
	$query->save("weizhuli_task",$_POST,' id = '.$_POST['id']);

}
/* д����־ */
admin_log("weizhuli_task",$_POST['id'],'task',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>