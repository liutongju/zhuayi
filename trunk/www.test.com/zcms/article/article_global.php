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
if (!file_exists(ZCMS_ROOT.'/zcms/article/include/article_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("����û�����ø�ģ��,���ڴ���ȥ����",'/index.php?m=article&c=config&a=init');
}

//-------����ҳ���ڲ��˵� 
$menu = array(
			'0'=>array('��������','config'),
			'1'=>array('������Ŀ','class'),
			'2'=>array('�����Ŀ','class_edit'),
			'3'=>array('������Ŀ����','class_cache'),
			'4'=>array('��������','index'),
			'5'=>array('��������','edit'),
			'6'=>array('����ȫ������','generate&act=show'),
			'7'=>array('����ȫ����Ŀ','generate&act=class')
			);


//-------����ģ����ʾ
$tips = '������ӡ��޸ġ�������Ŀȫ����ɺ󣬸�����Ŀ����';

//-------���������ļ�
include_once ZCMS_ROOT.'/zcms/article/include/article_config.php';

if ($article_generate == 0)
unset($menu[6]);

if ($article_class_generate == 0)
unset($menu[7]);
//-------���л�����λ
$flag = explode(chr(13),$flag);

//-------����ģ�滺���ļ�
$tpl_cache =  ZCMS_ROOT.'/data/data_cache/tpl.cache.php';

if (file_exists($tpl_cache))
{
	$tpl_cache = file_get_contents($tpl_cache);
	$tpl_cache = unserialize($tpl_cache);
}

//----Ƶ��URL
if ($article_index_generate==1)
{
	$article_url = $article_index_path;
}
else
{
	$article_url = $article_index_url;
}
?>