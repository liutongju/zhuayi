<?php
/**
 * admin_menu.php     ZCMS ��̨�˵�����
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');

$tips = 'Ϊ�����Ч�ʣ���ӡ��޸ġ�ɾ���������»���'; 
//-------����ҳ���ڲ��˵� 
$menu = array(
			'0'=>array('������վ������','index'),
			'1'=>array('�����վ������','edit&height=200','ajax'),
			'2'=>array('����վ�����ӻ���','cache'),
			);	
?>