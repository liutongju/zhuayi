<?php
/**
 * admin_index.php     ZCMS ��̨�˵��б�
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi
 * @QQ			 2179942
 */
/* ��֤��¼ */


verify_admin('admin_username');
/* ���÷���URL */
set_cookie("backurl",GetCurUrl(),0);
$menu = array(
			array('��������','task_account&uid='.$_REQUEST['id']),
			array('�������','task_account_edit&uid='.$_REQUEST['id'],'ajax'),
			);
$tips = "��ʾ��Ϣ����д��";



?>