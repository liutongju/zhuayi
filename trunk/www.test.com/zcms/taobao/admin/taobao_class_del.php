<?php
/**
 * admin_del.php     ZCMS ��̨�Ա�����Ŀɾ��
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi  
 * @QQ			 2179942
 */

//------�ж���·ID�Ƿ����
if (empty($_REQUEST['id']))
{
	showmsg('��û��ָ��Ҫɾ���ĸ��˵�..',-1);
}
else
{
	//-----�ж��Ƿ����Ӳ˵���������ֱ��ɾ����
	if ($query->maxnum("select count(*) from ".T."taobao_class where parent_id = ".$_REQUEST['id'])>0)
	{
		showmsg('�ò˵��»�������Ŀ��������ֱ��ɾ��<br><font color=red>����ɾ������Ŀ</font>',-1);
	}
	else
	{
		//---------д����־
		admin_log("taobao_class",$_REQUEST['id'],'classname','ɾ��������Ŀ');

		$query->delete("taobao_class"," id =".$_REQUEST['id']);
		
		showmsg('ɾ���ɹ�..����ȥ���ɻ���','/index.php?m=taobao&c=class_cache&a=init',1000);
	}
}exit;
?>