<?php
/**
 * admin_info.php     ZCMS ��̨������Ŀ������
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

/* ��֤��¼ */
verify_admin('admin_username');


if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '������Ŀ';
	$_POST['id'] = $query->save("blog_class",$_POST);
}
else
{
	$pagename = '�޸���Ŀ';

	if (is_array($_REQUEST['orders']))
	{
		$pagename = '������Ŀ';

		foreach ($_REQUEST['id'] as $key=>$value)
		{
			$order['orders'] = $_POST['orders'][$key];
			$query->save("blog_class",$order,' id='.$value);
		}
	}
	else
	{
		$query->save("blog_class",$_POST,' id = '.$_POST['id']);

	}
}

blog_url($_POST['id']);

/* д��SEO�� */

/* д����־ */
admin_log("blog_class",$_POST['id'],'classname',$pagename);
showmsg('��ϲ��,�����ɹ�',ret_cookie('backurl'));
?>