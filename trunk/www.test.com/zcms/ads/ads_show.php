<?php
/**
 * admin_edit.php     ZCMS ��̨�˵���ӡ��༭
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (!empty($_REQUEST['id']))
{
	
	$search .= " and id =".$_REQUEST['id'];
}
elseif (!empty($_REQUEST['key']))
{
	$search = " and concat(',',`key`,',') regexp concat(',(',replace('".urldecode($_REQUEST['key'])."',',','|'),'),')";
}
else
{
	exit('����');
}
if (!empty($_REQUEST['type']))
{
	$search .= " and type =".$_REQUEST['type'];
}

$info = $query->one_array("select * from ".T."ads where id>0".$search." order by rand()");
$info['count'] = addslashes($info['count']);
if ($_REQUEST['url'] =='true')
{
	$query->query("update ".T."ads set click = click+1 where id=".$info['id']);
	/* ��ת */
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