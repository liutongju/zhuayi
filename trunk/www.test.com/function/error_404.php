<?php

function error_404($title){
	global $tpl;
	echo $title;
	exit;
	header("HTTP/1.0 404 Not Found" );
	/* 获取当前信息 */
	$body = '<div style="background:#233040;color:#fff;font-family:\'微软雅黑\';padding-left:30px;">';
	$body .= '<h1 style="font-size:16px;margin:0px;padding:0px;padding-top:15px;">错误信息</h1>';
	$body .= '<ol>';
	$body .= '<li style="line-height:25px;padding-left:20px;">错误信息 : '.$title.'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">访问地址 : http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"].'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">访问时间 : '.date("Y-m-d G:i:s").'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">访问IP :'.get_ip().'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">访问脚本 : '.$_SERVER['PHP_SELF'].'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">通信协议 : '.$_SERVER['SERVER_PROTOCOL'].'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">网站编码 : '.$_SERVER['HTTP_ACCEPT_CHARSET'].'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">Host :'.$_SERVER['HTTP_HOST'].'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">链接的前一个页面 :'.$_SERVER['HTTP_REFERER'].'</li>';
	$body .= '<li style="line-height:25px;padding-left:20px;">用户信息 :'.$_SERVER['HTTP_USER_AGENT'].'</li>';
	$body .= '</ol>';
	$body .= '</div>';
	/* 载入邮件配置文件 */
	include_once ZCMS_ROOT.'/data/include/email_config.php';
	if ($error_push == 1)
	{
		$email['mail_server'] = $mail_server;
		$email['mail_port'] = $mail_port;
		$email['mail_from'] = $mail_from;
		$email['mail_auth'] = $mail_auth;
		$email['mail_user'] = $mail_user;
		$email['mail_password'] = $mail_password;
		email($email,$webname.'错误信息-'.$title,$body,$mail_to);
	}
	$tpl->LoadTemplate(ZCMS_ROOT.'/zcms/admin/template/admin/404.html');
	$tpl->Display();
	exit;
}

?>