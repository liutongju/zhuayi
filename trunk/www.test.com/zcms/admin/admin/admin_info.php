<?php
/**
 * admin_info.php     ZCMS �޸Ļ���ӹ���Ա
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */
$_POST['username'] = siconv($_POST['username']);
if (empty($_REQUEST['id']))
{
	$pagename = '��ӹ���Ա';
	$_POST['pass'] = mymd5($_POST['pass']);
	$_REQUEST['id'] = $query->save("admin",$_POST);

}
else
{
	$pagename = '�޸Ĺ���Ա';
	if (!empty($_POST['pass']))
	{
		$_POST['pass'] = mymd5($_POST['pass']);
	}
	else
	{
		unset($_POST['pass']);
	}
	$query->save("admin",$_POST,' id='.$_REQUEST['id']);
}
/* д����־ */
admin_log("admin",$_REQUEST['id'],'username',$pagename,$_REQUEST['id']);
exit('1');
?>