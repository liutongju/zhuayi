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

/* ��֤��¼ */
verify_admin('admin_username');
 
/* ����ҳ���ڲ��˵� */
$menu = array(
			'0'=>array('����˵�','index'),
			'1'=>array('��Ӳ˵�','edit','ajax'),
			'2'=>array('���²˵�����','cache')
			);
/* ����ģ����ʾ */
$tips = '������ӡ��޸ġ�����˵�ȫ����ɺ󣬸��²˵�����';
?>