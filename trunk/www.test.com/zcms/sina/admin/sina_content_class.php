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
verify_admin('admin_username');
$menu = array(
			array('�������','content_class'),
			array('��ӷ���','content_class_edit&height=150','ajax'),
			array('��������','content'),
			array('�������','content_edit&height300','ajax'),
			);

$tips = "��ʾ��Ϣ����д��";

set_cookie("backurl",GetCurUrl(),0);

if ($_REQUEST['title'] !=''){	$search .= " and a.title = '".$_REQUEST['title']."'";}
if ($_REQUEST['url'] !='')
{
	$search .= " and a.url = '".$_REQUEST['url']."'";
}

$maxnum = $query->maxnum("select count(*) from ".T."sina_content_class as a where a.id >0 ".$search);
?>