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
			'2'=>array('������Ŀ','class_edit'),
			'3'=>array('������Ŀ����','class_cache')
			);
//-------����ģ����ʾ
$tips = '�������ӡ��޸ġ�������Ŀȫ����ɺ󣬸�����Ŀ����';

//-------���������ļ�
include_once ZCMS_ROOT.'/zcms/article/include/article_config.php';

?>