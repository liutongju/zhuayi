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

//-------����ҳ���ڲ��˵� 
$menu = array(
			'0'=>array('��������','config'),
			'1'=>array('������Ŀ','class'),
			'2'=>array('�����Ŀ','class_edit'),
			'3'=>array('������Ŀ����','class_cache'),
			'4'=>array('��������','index'),
			'5'=>array('��������','edit'),
			'6'=>array('����ȫ������','generate')
			);


//-------����ģ����ʾ
$tips = '������ӡ��޸ġ�������Ŀȫ����ɺ󣬸�����Ŀ����';

//-------���������ļ�
include_once ZCMS_ROOT.'/zcms/article/include/article_config.php';

if ($article_generate == 0)
unset($menu[5]);

//-------���л�����λ
$flag = explode(chr(13),$flag);

//-------����ģ�滺���ļ�
$tpl_cache =  ZCMS_ROOT.'/data/data_cache/tpl.cache.php';

if (file_exists($tpl_cache))
{
	$tpl_cache = file_get_contents($tpl_cache);
	$tpl_cache = unserialize($tpl_cache);
}
?>