<?php
/**
 * admin_info.php     ZCMS 验证码规则入库
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

$_POST['rule'] = serialize($_POST['rule']); 
if (empty($_REQUEST['id']) && !is_array($_REQUEST['orders']))
{
	$pagename = '添加验证码规则';
	$_POST['id'] = $query->save("checkcode",$_POST);
}
else
{
	$pagename = '修改验证码规则';
	$query->save("checkcode",$_POST,' id = '.$_POST['id']);
	
}
//---------写入日志
admin_log("checkcode",$_POST['id'],'title',$pagename);
showmsg('恭喜您,操作成功',ret_cookie('backurl'));
?>