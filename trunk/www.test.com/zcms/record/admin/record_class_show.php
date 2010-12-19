<?php
/**
 * admin_edit.php     ZCMS 菜单展示
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi
 * @QQ			 2179942
 */
$_REQUEST['uid'] = intval($_REQUEST['uid']);
if (!empty($_REQUEST['uid']))
{
	$info = $query->arrays("select * from ".T."record_class where uid ='".$_REQUEST['uid']."'");
	echo '<select name="cid">';
	foreach ($info as $val)
	{
		echo '<option value='.$val['id'].'>'.$val['classname'].'</option>';
	}
	echo '</select>';
}
else
{
	exit('数据错误,只能是会员ID');
}
exit;
?>