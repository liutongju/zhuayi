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
verify_admin('admin_username');

/* ����ģ����ʾ */
$tips = '�ۺϱ�ǩ�ǽ��������µ�Tags��ȡ����ת�������������,�˹��ܽ��������������������';

if ($_REQUEST['tags'] == 1)
{
	$limit = 300;
	if (empty($_REQUEST['page']))
	{	
		$_REQUEST['page'] = 1;
		$startnum = 0 ;
	}
	else
	$startnum =  ($_REQUEST['page']-1)*$limit;

	/* ��ѯ���� */
	$list = $query->arrays("select tags from ".T."article limit $startnum , $limit");
	if (count($list)==0)
	{
		showmsg('��ϲ�㣬�����ɹ�',ret_cookie('backurl'));
	}
	/* ѭ��д������������� */
	foreach ($list as $val)
	{
		/* д��ǰ�����黯����ѯ�Ƿ���� */
		$val = explode(',',$val['tags']);
		foreach ($val as $vals)
		{
			/* ����Ƿ���� */
			$info = $query->one_array("select id from ".T."search where title ='".trim($vals)."'");
			if (empty($info['id']))
			{
				/* ���� */
				$query->query("insert into ".T."search(title,dtime,num,tables)values('".trim($vals)."','".time()."','0','article')");
			}
			else
			{
				/* ������������ */
				$query->query("update ".T."search set num = num+1 where id=".$info['id']);
			}
		}
	}
	$_REQUEST['page']++;
	showmsg('�Ѿ���ʽ����'.($startnum+count($list)).'������Ϣ','/index.php?m=article&c=tags&a=init&tags=1&page='.$_REQUEST['page']);
}
else
{
	/* ���÷���URL */
	set_cookie("backurl",GetCurUrl(),0);
}
?>