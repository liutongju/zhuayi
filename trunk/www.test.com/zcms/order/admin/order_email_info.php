<?php
/**
 * admin_info.php     ZCMS 邮件发送
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-----载入邮件配置文件
$email_config = ZCMS_ROOT.'/data/include/email_config.php';
if(!file_exists($email_config))
{
	exit('没有找到邮件配置文件，请先配置邮箱');
}
include_once $email_config;

$email_config = array();
$email_config['mail_server'] = $mail_server;
$email_config['mail_port'] = $mail_port;
$email_config['mail_from'] = $mail_from;
$email_config['mail_auth'] = $mail_auth;
$email_config['mail_user'] = $mail_user;
$email_config['mail_password'] = $mail_password;
//-----发送邮件
echo email($email_config,siconv($_POST['title']),siconv($_POST['body']),$_POST['email']);
$query->query("insert into ".T."order_log(oid,log,uid,dtime)values('".$_POST['id']."','发送邮件<font color=red>".siconv($_POST['title'])."</font>','".ret_cookie('admin_userid')."','".time()."')");
exit;
?>