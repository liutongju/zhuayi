<?php
/**
 * admin_index.php     ZCMS �Ա���Ŀ
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
verify_admin('admin_username');
//-------���÷���URL
set_cookie("backurl",GetCurUrl(),0);
//-------�жϻ����Ƿ����
if (!file_exists(ZCMS_CACHE.'taobao_class_cache.php'))
{
	showmsg('û�л����ļ�,����ȥ����..','/index.php?m=taobao&c=class_cache&a=init');
} 
else
{
	//------���뻺��
	include_once ZCMS_CACHE.'taobao_class_cache.php';
	$list = unserialize($taobao_class_cache);
}
?>