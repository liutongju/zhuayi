<?php
/**
 * admin_login_info.php     ZCMS ����������֤
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

//------������������������cookie��ֵ�������ֵ��ˢ��ҳ��ʱ�Զ�������״̬ 
if ($_GET['lock'] == 1)
{
	set_cookie('admin_lock',1);
	exit;
} 

$userid = ret_cookie('admin_userid');


if (empty($userid))
{
	//-----ȡ������COOKIE��ֵ
	set_cookie('admin_lock','');
	
	exit('-1');
} 

//------��֤��¼
$info = $query->one_array("select * from ".T."admin where id = '".$userid."' and pass = '".mymd5($_POST['password'])."'");
if (empty($info['id']))
{
	//-----ȡ������COOKIE��ֵ
	//set_cookie('admin_lock','0');
	exit('-2');
}
set_cookie('admin_lock','0');
exit;
?>