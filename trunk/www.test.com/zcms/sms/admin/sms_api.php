<?php
/**
 * admin_info.php     ZCMS ���ŷ��ͽӿ�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

set_time_limit(0);
include_once ZCMS_ROOT.'/zcms/sms/class/include/Client.php';
/*-------------SMS-------------*/
/**
 * ���ص�ַ
 */	
$gwUrl = $service;
/**
 * ���к�,��ͨ������������Ա��ȡ
 */
$serialNumber = $number;
/**
 * ����,��ͨ������������Ա��ȡ
 */
$password = $password;

/**
 * ��¼�������е�SESSION KEY������ͨ��login����ʱ����
 */
$sessionKey = '815370';

/**
 * ���ӳ�ʱʱ�䣬��λΪ��
 */
$connectTimeOut = $timeout;

/**
 * Զ����Ϣ��ȡ��ʱʱ�䣬��λΪ��
 */ 
$readTimeOut = 10; 
$proxyhost = false; //----��ѡ�������������ַ��Ĭ��Ϊ false ,��ʹ�ô��������
$proxyport = false; //---��ѡ������������˿ڣ�Ĭ��Ϊ false
$proxyusername = false; //---��ѡ������������û�����Ĭ��Ϊ false
$proxypassword = false; //----��ѡ��������������룬Ĭ��Ϊ false
$sms = new Client($gwUrl,$serialNumber,$password,$sessionKey,$proxyhost,$proxyport,$proxyusername,$proxypassword,$connectTimeOut,$readTimeOut);
/**
 * ���������˵ı��룬�����ҳ��ı���ΪGBK����ʹ��GBK
 */
$sms->setOutgoingEncoding("GBK");
?>