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
$menu = array(
			'0'=>array('ZCMS����','zcms'),
			'1'=>array('��վ����','web'),
			'2'=>array('��������','email'),
			'3'=>array('��������','annex'),
			);
$tips = '��������д���в���,���ò���ȷ���ܻ�ʹ������վ����.';
?>