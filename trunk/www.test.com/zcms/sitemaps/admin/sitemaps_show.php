<?php
/**
 * admin_info.php     ZCMS ��̨�˵�������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */
//header('Content-Type: text/xml; charset=gbk');
$path = ZCMS_ROOT.urldecode($_REQUEST['path']).$_REQUEST['filename'];
$tpl->LoadTemplate(urldecode($_REQUEST['tpl']));
$count =  '<?xml version="1.0" encoding="gbk" ?>'."\r\n".$tpl->savestr();
//---��ȡ��׺
$h = '.'.trim(substr(strrchr($path,'.'),1,100));

if (empty($_REQUEST['page']))
{
	$html = $h;
}
else
{
	$html = '_'.$_REQUEST['page'].$h;
}
write(str_replace($h,$html,$path),$count);
//----������ҳ��$maxnum = $query->maxnum("select count(*) from ".T.$_REQUEST['dbsource']);
echo ceil($maxnum/$_REQUEST['num']);
exit;
?>