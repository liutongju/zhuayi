<?php
/**
 * admin_info.php     ZCMS ��̨������Ŀ������
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */


if (empty($_REQUEST['id']))
{
	$_POST['id'] = $query->save("sina_account_class",$_POST);
}
else
{
	$query->save("sina_account_class",$_POST,' id = '.$_POST['id']);

}

showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>