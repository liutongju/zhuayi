<?php
/**
 * index.php     SOSCMS ����ļ�
 * 
 * @copyright    (C) 2005 - 2010  SOSCMS
 * @licenes      http://www.sosocms.cn
 * @lastmodify   2010-10-27
 * @author       zhuayi  
 * @QQ			 2179942
 */
//-----����SOSCMS��Ŀ¼·��
define('SOSCMS_ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
//-----���幫�ú�����·��
define('SOSCMS_FUN', SOSCMS_ROOT.'/data/data_cache/function.public.php');

//-----��������
include SOSCMS_ROOT.'/class/Routing.class.php';

//-----��ʼ��Ӧ�ó���
$sos = new Routing();
$sos->creat_app();
?>