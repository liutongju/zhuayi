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
/* ��֤��¼ */
verify_admin('admin_username');

if (!file_exists(ZCMS_ROOT.'/zcms/sms/include/sms_config.php') && $_REQUEST['c']!='config' && $_REQUEST['c']!='config_info')
{
	showmsg("����û�����ø�ģ��,���ڴ���ȥ����",'/index.php?m=sms&c=config&a=init');
}

/* ����ҳ���ڲ��˵�  */
$menu = array(
			'0'=>array('�ӿ�����','config'),
			'1'=>array('�������','class'),
			'2'=>array('��ӷ���','class_edit&height=230','ajax'),
			'3'=>array('�������','index'),
			'4'=>array('��Ӻ���','edit&height=230','ajax'),
			'5'=>array('���Ͷ���','play&height=250&width=700','ajax'),
			'6'=>array('���������','task'),
			'7'=>array('��������','task_edit'),
			'8'=>array('�������','import&height=200','ajax'),
			);

/* �ܼƷ����� */
$toll = $query->one_array("select * from ".T."sms_statistics");

/* ����ģ����ʾ */
$tips = '������ƽ̨�ǻ�����������ƽ̨�����,�����Ϣ��ͨ��������ȡ,�������,����ϵ��������,QQ:2179942,�ֻ�:18611743551<br><font color=red>��ϵͳ�ѳɹ������� <b>'.$toll['sms_num'].'</b> ����Ϣ</font>';


/* ����ӿ������ļ� */
include_once ZCMS_ROOT.'/zcms/sms/include/sms_config.php';
/*  ���÷��ͽӿ� */
$sessionKey = '815370';
$readTimeOut = 10; 
$proxyhost = false; //----��ѡ�������������ַ��Ĭ��Ϊ false ,��ʹ�ô��������
$proxyport = false; //---��ѡ������������˿ڣ�Ĭ��Ϊ false
$proxyusername = false; //---��ѡ������������û�����Ĭ��Ϊ false
$proxypassword = false; //----��ѡ��������������룬Ĭ��Ϊ false
include_once ZCMS_ROOT.'/zcms/sms/class/include/Client.php';
$sms = new Client($gateway,$serial,$password,$sessionKey,$proxyhost,$proxyport,$proxyusername,$proxypassword,$outtime,$readTimeOut);
$sms->setOutgoingEncoding("GBK");
?>