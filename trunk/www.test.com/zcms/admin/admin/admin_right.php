<?php
/**
 * admin_info.php     ZCMS �Ҳ���Ϣ
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */


//----ȥ��ѯ�Ƿ��а汾����
$zcms_version = str_replace(' ','_',$zcms_version);
//---�ж��Ƿ��и���
if (!empty($update_info))
{
	//---�����л�
	$update_info = unserialize($update_info);
	if (!empty($update_info['zcms_upload_version_next']))
	{
		$zcms_version = str_replace('_',' ',$zcms_version).' <a href="/index.php?m=admin&c=update&a=init" style="color:red">[�¸��� '.$update_info['zcms_upload_version_next'].']</a>';
	}
}
else
{
	$zcms_version_tips = ' <font color=#009900>[�������°汾]</font>';
}
?>