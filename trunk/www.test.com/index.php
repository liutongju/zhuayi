<?php
/**
 * index.php     ZCMS ����ļ�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 *///----����һ�����
error_reporting(E_ALL^E_NOTICE^E_WARNING);

//-----���ҳ���ַ���
header('Content-type: text/html; charset=gbk');

/* -- �ж��Ƿ�װ ---*/
if(!file_exists('./data/zcms.lock') ){exit('<a href="/install/">��δ��װ</a>');}

//-----��ʩ�������г�ʼʱ��
$pagestartime=microtime(); 

//-----����ZCMS��Ŀ¼·��
define('ZCMS_ROOT', str_replace("\\", '/', dirname(__FILE__)));

//-----���幫�ú�����·��
define('ZCMS_FUN', ZCMS_ROOT.'/data/data_cache/function.public.php');

//-----���建��·��
define('ZCMS_CACHE', ZCMS_ROOT.'/data/data_cache/');

//-----���幫�����
define('ZCMS_CLASS', ZCMS_ROOT.'/class/');

//-----����ϵͳģ��·��
define('ZCMS_TPLPATH', ZCMS_ROOT.'/statics/template');

//-----����ģ�滺��·��
define('ZCMS_TPLCACHE', ZCMS_ROOT.'/data/tpl_cache/');

//-----����ʱ��
date_default_timezone_set('Asia/Shanghai');

//-----������վ�����ļ�
include_once ZCMS_ROOT.'/data/include/web_config.php';

//-----����ZCMS����·��
define('ZCMS_URL', $weburl);

//-----�������ݿ������ļ�
include_once ZCMS_ROOT.'/data/include/zcms_config.php';

//-----�汾��Ϣ
include_once ZCMS_ROOT.'/data/zcms_version.php';
//-----�������ݿ���
include_once(ZCMS_ROOT.'/class/mysql.class.php');
$query = new dbQuery($dbhost,$dbuser,$dbpw,$dbname,'GBK');
//-----�������ݱ�ǰ׺
define('T', $cookievarpre);

//-----����ZCMS���湤��

include ZCMS_ROOT.'/class/cache.class.php';
$cache = new cache();

//-----������URL������
include ZCMS_ROOT.'/class/routing.class.php';
$url = new routing();
$url->app();

//-----��������ģ��ȫ���ļ�
if(file_exists($_REQUEST['g_file']))
{
	include_once $_REQUEST['g_file'];
}
//------����ģ��
require ZCMS_ROOT.'/class/template.class.php';
$tpl = new DedeTemplate();

//-----����ģ���ļ�
if(file_exists($_REQUEST['m_file']))
{
	include_once $_REQUEST['m_file'];
}
$tpl->LoadTemplate($_REQUEST['c_file']);
$tpl->Display();

/*
$zcms_upload['zcms_version'] = 'Zcms V3 Beta Release 20101124';
$zcms_upload['zcms_upload_tips'] = '������վ����ʱ�������վ�������С�/�������滻����/��<br>������������UE����������á�|����������ʾ������';
$zcms_upload['zcms_upload_file']= array(
							'/zcms/admin/template/admin_right.html',
						);
$zcms_upload['zcms_upload_version_next'] = 'Zcms V3 Beta Release 20101126';						
$zcms_upload['zcms_upload_sql'] = 'update `{%z%}admin` set username = "zhuayi86" where id = 2;';	
echo serialize($zcms_upload);*/
?>