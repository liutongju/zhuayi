<?php
/**
 * admin_menu.php     ZCMS ����ģ��
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');
//-------����ҳ���ڲ��˵� 
$menu = array(
			'0'=>array('�����б�','index','','&recycle=0'),
			'1'=>array('��Ӷ���','edit'),
			'2'=>array('���ͷ�ʽ','method'),
			'3'=>array('������ͷ�ʽ','method_edit','ajax')
			);
//-------����ģ����ʾ
$tips = '...';

//-------���������ļ�
include_once ZCMS_ROOT.'/zcms/order/include/order_config.php';
?>