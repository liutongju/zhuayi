<?php
/**
 * admin_menu.php     ZCMS ��̨ģ�����
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
			'0'=>array('����ģ��','index'),
			'1'=>array('����ģ��','import&height=200','ajax'),
			);
$tips = '�� ж��ģ��󣬽���ɾ��ģ���Ӧ�����ݺ��ļ��������ز���';


?>