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

if ($_REQUEST['uid'] !='')
{
	$search .= " and a.uid = '".$_REQUEST['uid']."'";
}
$info['uid'] = ret_cookie('admin_userid');
if($info['uid'] == 2){
	$info['uid'] = '';
}
$maxnum = $query->maxnum("select count(*) from ".T."sina_content as a where a.id >0 ".$search);
?>