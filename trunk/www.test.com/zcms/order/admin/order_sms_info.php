<?php
/**
 * admin_info.php     ZCMS 短信发送
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-----载入邮件配置文件
$sms_config = ZCMS_ROOT.'/zcms/sms/include/sms_config.php';

if(!file_exists($sms_config))
{
	exit('没有找到短信配置文件，请先配置短信接口');
}

include_once $sms_config;
include_once ZCMS_ROOT.'/zcms/sms/admin/sms_api.php';

//-----发送短信
echo $sms->sendSMS(array(trim($_POST['sms'])),siconv($_POST['body']));
$query->query("insert into ".T."order_log(oid,log,uid,dtime)values('".$_POST['id']."','发送短信----<font color=red>".siconv($_POST['body'])."</font>','".ret_cookie('admin_userid')."','".time()."')");
exit;
?>