<?php
/**
 * admin_global.php     ZCMS ��̨�������,
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

/* ��֤�Ƿ��¼״̬ */
if (!empty($_REQUEST['a']))
{
	verify_admin('admin_username');
}


/* ����ҳ���ڲ��˵�  */
$menu = array(
			'0'=>array('�������','class'),
			'1'=>array('��ӷ���','class_edit','ajax'),
			'2'=>array('��¼����','index'),
			'3'=>array('��Ӽ�¼','edit'),
			);
$tips = '��ַ�������ڻ�Աϵͳ����';
$GLOBALS['zcms_config']['perpagenum'] = 20;
$background = handie(ZCMS_ROOT.'/zcms/record/template/images/icon',1);

?>