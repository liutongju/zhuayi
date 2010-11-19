<?php
/**
 * admin_edit.php     ZCMS 后台菜单添加、编辑
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_REQUEST['id']))
{
	exit('错误');
}
else
{
	$info = $query->one_array("select * from ".T."ads where id =".$_REQUEST['id']);
}
if ($_REQUEST['url'] =='true')
{
	$query->query("update ".T."ads set click = click+1 where id=".$info['id']);
	//----跳转
	echo "<script>window.location.href='".$info['link']."'</script>";
	exit;
}
if ($info['type'] == 2)
{
	echo 'document.write("<a href=\"index.php?m=ads&c=show&id='.$info['id'].'&url=true\" target=\"_blank\"><img src=\"'.$info['count'].'\"/></a>")';
}
if ($info['type'] == 1)
{
	echo 'document.write("<a href=\"index.php?m=ads&c=show&id='.$info['id'].'&url=true\" target=\"_blank\">'.$info['count'].'</a>")';
}
if ($info['type'] == 3)
{
	echo 'document.write("<embed src=\"'.$info['count'].'\" quality=\high\"  align=\"middle\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\"></embed>")';
}

if ($info['type'] == 4)
{
	$info['count'] = trim(str_replace('	','',preg_replace('/\r|\n/', '',$info['count'])));
	echo 'document.write("'.$info['count'].'")';
}
exit;
?>