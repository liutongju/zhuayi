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

/* ����ҳ���ڲ��˵�  */
$menu = array(
			'0'=>array('�ӿ�����','api'),
			'1'=>array('��ӽӿ�','api_edit&height=200','ajax')
			);


/* ����ģ����ʾ */
$tips = '������ӡ��޸ġ�������Ŀȫ����ɺ󣬸�����Ŀ����';



?>