<?php
/**
 * admin_menu.php     ZCMS ��̨�������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

if ($_REQUEST['c']!='show')
{ 
	//-------��֤��¼
	verify_admin('admin_username');
}
//-------����ҳ���ڲ��˵� 
$menu = array(
			'0'=>array('������','index'),
			'1'=>array('��ӹ��','edit&height=400&width=700','ajax'),
			);
$tips = '��������,���Ե������,���Ƶ��ô����ģ����Ӧλ�ü���...';
?>