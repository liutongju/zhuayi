<?php
/**
 * admin_login_info.php     ZCMS ��¼��֤
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* �ж���֤�� */
$code = ret_cookie('checkcode');
if (md5($_POST['code']) != $code)
{
	showmsg('��֤�����...',-1);
}
/* ��֤��¼ */
$info = $query->one_array("select * from ".T."admin where username = '".$_POST['username']."' and pass = '".mymd5($_POST['password'])."'");
if (empty($info['id']))
{
	showmsg("�˺Ż��������..",'-1');
}
else
{
	/* ���µ�¼ʱ�� */
	$query->query("update ".T."admin set login_time = ".time().", login_ip ='".get_ip()."'");
	set_cookie('admin_username',$_POST['username']);
	set_cookie('admin_userid',$info['id']);
	/* д����־ */
	admin_log("admin",$info['id'],'username','��̨��¼',$info['id']);
	showmsg('��¼�ɹ���','/index.php?m=admin&c=index&a=init');
}
exit;
?>