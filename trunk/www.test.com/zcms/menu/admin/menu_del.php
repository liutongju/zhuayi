<?php
/**
 * admin_del.php     ZCMS ��̨�˵�ɾ��
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* �ж���·ID�Ƿ���� */
if (empty($_REQUEST['id']))
{
	showmsg('��û��ָ��Ҫɾ���ĸ��˵�..',-1);
}
else
{
	/* �ж��Ƿ����Ӳ˵���������ֱ��ɾ���� */
	if ($query->maxnum("select count(*) from ".T."menu where parent_id = ".$_REQUEST['id'])>0)
	{
		showmsg('�ò˵��»����Ӳ˵���������ֱ��ɾ��<br><font color=red>����ɾ���Ӳ˵�</font>',-1);
	}
	else
	{
		/* д����־ */
		admin_log("menu",$_REQUEST['id'],'title','ɾ����̨�˵�');

		$query->delete("menu"," id =".$_REQUEST['id']);
		
		showmsg('ɾ���ɹ�..����ȥ���ɻ���','/index.php?m=menu&c=cache&a=init',1000);
	}
}exit;
?>