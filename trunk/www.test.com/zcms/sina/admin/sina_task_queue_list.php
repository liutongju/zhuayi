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
/* ��֤��¼ */
$tips = "�����ĵ����д";

verify_admin('admin_username');
/* ���÷���URL */
set_cookie("backurl",GetCurUrl(),0);
$menu = array(
			array('�������','task_queue_list'),

			);
if (!empty($_REQUEST['username']))
{
	$search .= " and a.uid in (select id from ".T."sina_account where username like '%".urldecode($_REQUEST['username'])."%')";
}
if (!empty($_REQUEST['title']))
{
	$search .= " and a.title like '%".urldecode($_REQUEST['title'])."%'";
}
if ($_REQUEST['status'] == 1)
{
	$search .= " and a.reset like '%�ɹ�%'";
}
elseif ($_REQUEST['status'] == '2')
{
	$search .= " and a.reset not like '%�ɹ�%'";
}
$maxnum = $query->maxnum("select count(*) from ".T."sina_task_queue as a  where a.id>0".$search.$my);


?>