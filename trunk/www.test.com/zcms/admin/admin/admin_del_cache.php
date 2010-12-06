<?php
/**
 * admin_index.php     ZCMS 清空缓存
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* 查询当前登录管理员信息 */

if ($_REQUEST['if'] == 1)
{
	if ($_REQUEST['page']=='')
	$_REQUEST['page'] = 1;
	
	$caches[] = '';
	$caches[] = array('tpl_cache','模版缓存');
	$caches[] = array('data_cache','数据缓存');
	$caches[] = array('install_cache','模块安装缓存');
	
	$body = '<script>window.parent.document.getElementById(\'file\').innerHTML +="<li>';
	
	if ($_REQUEST['page'] >= count($caches))
	{
		$body .= '　<font color=red>更新完成..........</font>';
		$body .= '</li>"</script>';
		echo $body;
		/* 写入日志 */
		admin_log("cache",'','','更新缓存','');
		exit;
	}
	else
	{
		
		$filename = ZCMS_ROOT."/data/".$caches[$_REQUEST['page']][0].'/'; 
		$files = handie($filename);
		if (!empty($files))
		{
			foreach ($files as &$value)
			{
				@unlink($value);
			}
		}
		$body .= '　更新'.$caches[$_REQUEST['page']][1].'完成..........<br>';
		$body .= '</li>"</script>';
		echo $body;
	}
	$_REQUEST['page']++;
	echo '<script>setTimeout("window.location.href=\'/index.php?m=admin&c=del_cache&a=init&if=1&page='.$_REQUEST['page'].'\'",1000)</script>'; /* 跳转 */
	exit;
}
?>