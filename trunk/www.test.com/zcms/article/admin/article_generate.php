<?php
/**
 * admin_edit.php     ZCMS ��̨���±༭�����
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* ��֤��¼ */
verify_admin('admin_username');

if ($_REQUEST['ok'] == 1)
{

	if (is_array($_REQUEST['id']))
	{
		$_REQUEST['id'] = implode(",",$_REQUEST['id']);
		$search = ' and id in('.$_REQUEST['id'].')';
	}

	if ($_REQUEST['act'] == 'class')
	{
		$tables = 'article_class';
		$fields = 'classname';
		$zfields = 'cid';
	}
	if ($_REQUEST['act'] == 'show')
	{
		$tables = 'article';
		$fields = 'title';
		$zfields = 'id';
	}

	/* ��ʼ���� */
	if (!empty($_REQUEST['start']))
	{
		$search .= " and id>".$_REQUEST['start'];
	}
	if (!empty($_REQUEST['end']))
	{
		$search .= " and id <".$_REQUEST['end'];
	}
	$sql = "select id,".$fields." from ".T.$tables." where id >0".$search;
	$reset = $query->query($sql);
	while ($row = $query->fetch_array($reset))
	{
		$id[] = $row['id'];
		$title[] = trim(addslashes($row[$fields]));
	}
	$id =  '"'.implode("\",\"",$id).'"';
	$title =  '"'.implode("\",\"",$title).'"';
}
else
{
	/* ������������ */
	$_REQUEST['c_file'] = ZCMS_ROOT.'/zcms/article/template/admin/article_generate_tips.html';
	$tips = '��ʼ�ͽ������䲻һ��Ҫ��д�����ȫ��Ϊ0������ȫ�����������Ϊ0�������ɿ�ʼ�����һ��';
}



?>