<?php
/**
 * admin_edit.php     ZCMS ģ�鰲װ
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */


$pagename = "ģ�鰲װ";
if (empty($_REQUEST['id']))
{
	showmsg('�������������Դ','-1');
}
else
{
	$info = $query->one_array("select * from ".T."module where id =".$_REQUEST['id']);
	$file = ZCMS_ROOT.'/zcms/'.$info['mark'].'/install/';
	//----��ģ�Ͳ˵��ļ���װ�˵�
	$menus = file_get_contents($file.'menu.php');
	$menus = unserialize(trim($menus));

	if ($info['type'] == 0)
	{
		$menus[0]['parent_id'] = 0;
	}
	else
	{
		$menus[0]['parent_id'] = 29;
	}
	foreach ($menus as $key=>$val)
	{
		//------����ģ��ID
		$menus[$key]['mid']  = $_REQUEST['id'];
		
		$menus[$key]['id'] = $query->save("menu",$val);
		if (isset($val['parent']))
		{
			$menus[$key]['parent_id'] = $menus[$val['parent']]['id'];
		}
	}
	//-----���²˵�
	foreach ($menus as $key=>$val)
	{
		$query->save("menu",$val,' id ='.$val['id']);
		//----�õ�Ȩ��ID
		$purview[] = $val['id'];
	}
	//----д��Ȩ��
	$query->query("update ".T."admin_group set purview = concat(purview,',".implode(',',$purview)."') where id =2");
	//----��װ���ݿ�
	$sql = handie($file.'sql/');
	foreach ($sql as $key=>$val)
	{
		//----��SQL�ļ�
		$content = file_get_contents($val);
		//------ת��Ϊ����
		$content = explode(";",$content);

		//------��װ���ݿ�
		foreach ($content as $vals)
		{
			if (!empty($vals))
			$query->query(str_replace('{%z%}',$cookievarpre,siconv($vals)));
		}
	}
	//-------����ģ���Ѱ�װ
	$query->query("update ".T."module set install = 1,dtime = '".time()."' where id = ".$_REQUEST['id']);
	showmsg('��װ�ɹ�..',ret_cookie('backurl'));
	exit;
}
?>