<?php
/**
 * admin_menu.php     ZCMS ��̨���¹���
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */
if (!file_exists(ZCMS_ROOT.'/zcms/blog/include/blog_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("����û�����ø�ģ��,���ڴ���ȥ����",'/index.php?m=blog&c=config&a=init');
}

/* ����ҳ���ڲ��˵�  */
$menu = array(
			'0'=>array('��������','config'),
			'1'=>array('������Ŀ','class'),
			'2'=>array('�����Ŀ','class_edit'),
			'3'=>array('������','index'),
			'4'=>array('��������','edit'),
			);


/* ����ģ����ʾ */
$tips = 'ZcmsBlog�ɻ�������΢��,��������΢��ͬ��,��Ȼ��Ҳ����ѡ�񲻿�����';

/* ���������ļ� */
include_once ZCMS_ROOT.'/zcms/blog/include/blog_config.php';
?>