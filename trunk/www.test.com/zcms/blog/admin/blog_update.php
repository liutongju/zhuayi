<?php
/**
 * admin_info.php     ZCMS ��̨����������
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

/* ��֤��¼ */
verify_admin('admin_username');

if (!is_array($_REQUEST['id']))
{
	showmsg('��û��ѡ����Ϣ',-1);
}
$_REQUEST['id'] = implode(',',$_REQUEST['id']);


if ($_REQUEST['action'] == 'cid')
$query->query("update ".T."blog set cid = '".$_REQUEST['yidong']."' where id in (".$_REQUEST['id'].")");

showmsg('��ϲ�㣬�����ɹ�',ret_cookie('backurl'));
?>