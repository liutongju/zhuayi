<?php
/**
 * admin_info.php     ZCMS ������Ϣ
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

$zcms_version = str_replace(' ','_',$zcms_version);
if ($_REQUEST['update']=='')
{
	/* ȥ��ѯ�Ƿ��а汾���� */
	$update_info = file_get_contents('http://www.zcms.cc/update/'.$zcms_version.'/upload_info.txt');
	
	
	
	/* �����л����飬����д�뻺�� */
	$update_info = unserialize($update_info);
	$zcms_upload['file'] = $update_info['zcms_upload_file'];
	$zcms_upload['sql'] = $update_info['zcms_upload_sql'];
	
	if (empty($update_info['zcms_upload_version_next']))
	{
		showmsg('û�п��õĸ�����','-1');
	}
	/* д���ļ� */
	$conent = '<?php'."\r\n";

	$conent .= '$zcms_version_update = \''.serialize($zcms_upload)."';\r\n";  
	$conent .= '$zcms_upload_version_next = \''.$update_info['zcms_upload_version_next']."'\r\n";  

	$conent .= '?>';
	
	$file = "\"".implode('","',$zcms_upload['file'])."\"";
	write(ZCMS_ROOT.'/data/install_cache/'.$zcms_version.'.php',$conent);
}
else
{
	/* ��������ļ��Ļ��� */
	include_once ZCMS_ROOT.'/data/install_cache/'.$zcms_version.'.php';
	
	/* ���������飬�û������ļ� */
	$zcms_version_update = unserialize($zcms_version_update);
		
	if ($_REQUEST['update'] == 1)
	{
		$maxnum = count($zcms_version_update['file']);
		if (empty($_REQUEST['page']))
		$_REQUEST['page'] = 0;
		
		$file =  $zcms_version_update['file'][$_REQUEST['page']];
		
		/* Զ�̻�ȡ���� */
		
		$conent = file_get_contents('http://www.zcms.cc/update/'.$zcms_version.$file.'.txt');
		if ($conent!='')
		write(ZCMS_ROOT.$file,$conent);
		echo $maxnum;
		exit;
	}
	else
	{
		$sql = explode(';',$zcms_version_update['sql']);
		foreach ($sql as $val)
		{
			$val= str_replace('{%z%}',T,$val);
			if (!empty($val))
			$query->query($val);
			
			/* ���°汾 д���ļ� */
			$conent = '<?php'."\r\n";
			$conent .='$zcms_version = \''.$zcms_upload_version_next."';\r\n";  
			$conent .= '?>';
			write(ZCMS_ROOT.'/data/zcms_version.php',$conent);
			echo '0';
			exit;
		}
		
	}
	exit;}
?>