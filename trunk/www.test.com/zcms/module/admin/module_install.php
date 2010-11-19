<?php
/**
 * admin_edit.php     ZCMS 模块安装
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */


$pagename = "模块安装";
if (empty($_REQUEST['id']))
{
	showmsg('错误的数据与来源','-1');
}
else
{
	$info = $query->one_array("select * from ".T."module where id =".$_REQUEST['id']);
	$file = ZCMS_ROOT.'/zcms/'.$info['mark'].'/install/';
	//----打开模型菜单文件安装菜单
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
		//------设置模型ID
		$menus[$key]['mid']  = $_REQUEST['id'];
		
		$menus[$key]['id'] = $query->save("menu",$val);
		if (isset($val['parent']))
		{
			$menus[$key]['parent_id'] = $menus[$val['parent']]['id'];
		}
	}
	//-----更新菜单
	foreach ($menus as $key=>$val)
	{
		$query->save("menu",$val,' id ='.$val['id']);
		//----得到权限ID
		$purview[] = $val['id'];
	}
	//----写入权限
	$query->query("update ".T."admin_group set purview = concat(purview,',".implode(',',$purview)."') where id =2");
	//----安装数据库
	$sql = handie($file.'sql/');
	foreach ($sql as $key=>$val)
	{
		//----打开SQL文件
		$content = file_get_contents($val);
		//------转换为数组
		$content = explode(";",$content);

		//------安装数据库
		foreach ($content as $vals)
		{
			if (!empty($vals))
			$query->query(str_replace('{%z%}',$cookievarpre,siconv($vals)));
		}
	}
	//-------更新模块已安装
	$query->query("update ".T."module set install = 1,dtime = '".time()."' where id = ".$_REQUEST['id']);
	showmsg('安装成功..',ret_cookie('backurl'));
	exit;
}
?>