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

//-------��֤��¼
verify_admin('admin_username');

if (!is_array($_REQUEST['id']))
{
	showmsg('��û��ѡ����Ϣ',-1);
}
$_REQUEST['id'] = implode(',',$_REQUEST['id']);


if ($_REQUEST['action'] == 'flag')
$query->query("update ".T."article set flag = concat(replace(flag,'".$_REQUEST['tuisong']."',''),',".$_REQUEST['tuisong']."') where id in (".$_REQUEST['id'].")");
elseif ($_REQUEST['action'] == 'cid')
$query->query("update ".T."article set cid = '".$_REQUEST['yidong']."' where id in (".$_REQUEST['id'].")");

showmsg('��ϲ�㣬�����ɹ�',ret_cookie('backurl'));
?>