<?php
/**
 * checkcode.php     ZCMS ���--��֤��,
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */

//------������֤����
include_once ZCMS_ROOT.'/class/checkcode.class.php';
$checkcode = new checkcode();
$checkcode->creat_code();
 
//-------����ҳ���ڲ��˵� 
$menu = array(
			'0'=>array('��֤�����','index'),
			'1'=>array('�����֤�����','edit&height=300','ajax'),
			);
//-------����ģ����ʾ
$tips = '���ڰ���������֤���ַ����...';
?>