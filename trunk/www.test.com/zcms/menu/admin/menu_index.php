<?php
/**
 * admin_index.php     ZCMS ��̨�˵��б�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */
/* ���÷���URL */
set_cookie("backurl",GetCurUrl(),0);
/* �жϻ����Ƿ���� */
if (!file_exists(ZCMS_CACHE.'menu_cache.php'))
{
	showmsg('û�л����ļ�,����ȥ����..','/index.php?m=menu&c=cache&a=init');
} 
else
{
	/* ���뻺�� */
	include_once ZCMS_CACHE.'menu_cache.php';
	$list = unserialize($menu_cache);
}
?>