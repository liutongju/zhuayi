<?php
/**
 * admin_menu.php     ZCMS �Ա���
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
			'0'=>array('�Ա�������','config'),
			'1'=>array('������Ŀ','class'),
			'2'=>array('�����Ŀ','class_edit'),
			'3'=>array('������Ŀ����','class_cache'),
			'4'=>array('������Ʒ','index'),
			'5'=>array('������Ʒ','edit'),
			'6'=>array('������Ʒ','data'),
			);
$tips = '��������д���в���,���ò���ȷ���ܻ�ʹ������վ����.';

if (!file_exists(ZCMS_ROOT.'/zcms/taobao/include/taobao_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("����û�����ø�ģ��,���ڴ���ȥ����",'/index.php?m=taobao&c=config&a=init');
}

//-------�����Ա��������ļ�
include_once ZCMS_ROOT.'/zcms/taobao/include/taobao_config.php';

?>