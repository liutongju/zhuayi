<?php
/**
 * admin_global.php     ZCMS ��̨�������,
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* ��֤�Ƿ��¼״̬ */
if (empty($_REQUEST['c']) || ($_REQUEST['c']!='login' && $_REQUEST['c']!='login_info'))
{
	verify_admin('admin_username');
}

/* ��ֵ����COOKIE�����ж��Ƿ�Ϊ����״̬��*/
$admin_lock = ret_cookie('admin_lock');

/* ����ҳ���ڲ��˵�  */
$menu = array(
			'0'=>array('�����ɫ','group'),
			'1'=>array('��ɫ���','group_edit'),
			'2'=>array('�����ʺ�','list'),
			'3'=>array('�ʺ����','edit','ajax'),
			);
$tips = '��ӭ���� '.$webname.' ��������';			
?>