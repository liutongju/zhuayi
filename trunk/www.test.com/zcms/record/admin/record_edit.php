<?php
/**
 * admin_edit.php     ZCMS �˵���ӡ��༭
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */

if (!empty($_REQUEST['id']))
{
	$pagename = "�༭��վ";
	$info = $query->one_array("select * from ".T."record where id =".$_REQUEST['id']);
}
else
{
	$pagename = "�����վ";
	$info['uid'] = ret_cookie('admin_userid');
	$info['icon'] = '/zcms/record/template/images/icon/7.png';
}

?>