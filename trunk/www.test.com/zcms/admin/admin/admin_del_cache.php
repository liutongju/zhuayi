<?php
/**
 * admin_index.php     ZCMS ��ջ���
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* ��ѯ��ǰ��¼����Ա��Ϣ */

if ($_REQUEST['if'] == 1)
{
	if ($_REQUEST['page']=='')
	$_REQUEST['page'] = 1;
	
	$caches[] = '';
	$caches[] = array('tpl_cache','ģ�滺��');
	$caches[] = array('data_cache','���ݻ���');
	$caches[] = array('install_cache','ģ�鰲װ����');
	
	$body = '<script>window.parent.document.getElementById(\'file\').innerHTML +="<li>';
	
	if ($_REQUEST['page'] >= count($caches))
	{
		$body .= '��<font color=red>�������..........</font>';
		$body .= '</li>"</script>';
		echo $body;
		/* д����־ */
		admin_log("cache",'','','���»���','');
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
		$body .= '������'.$caches[$_REQUEST['page']][1].'���..........<br>';
		$body .= '</li>"</script>';
		echo $body;
	}
	$_REQUEST['page']++;
	echo '<script>setTimeout("window.location.href=\'/index.php?m=admin&c=del_cache&a=init&if=1&page='.$_REQUEST['page'].'\'",1000)</script>'; /* ��ת */
	exit;
}
?>