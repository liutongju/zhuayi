<?php

function error_404(){
	global $tpl;
	header("HTTP/1.0 404 Not Found" );
	//-----��ȡ��ǰ��Ϣ
	$body = '<div style="background:#233040;color:#fff;font-family:\'΢���ź�\';">';
	$body .= '<h1 style="font-size:16px;margin:0px;padding:0px;padding-left:15px;padding-top:15px;">������Ϣ</h1>';
	$body .= '<ol>';
	$body .= '<li style="line-height:25px;">���ʵ�ַ:http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"].'</li>';
	$body .= '<li style="line-height:25px;">����ʱ��:'.date("Y-m-d G:i:s").'</li>';
	$body .= '<li style="line-height:25px;">����IP:'.get_ip().'</li>';
	$body .= '<li style="line-height:25px;">���ʽű�:'.$_SERVER['PHP_SELF'].'</li>';
	$body .= '<li style="line-height:25px;">ͨ��Э��:'.$_SERVER['SERVER_PROTOCOL'].'</li>';
	$body .= '<li style="line-height:25px;">��վ����:'.$_SERVER['HTTP_ACCEPT_CHARSET'].'</li>';
	$body .= '<li style="line-height:25px;">Host:'.$_SERVER['HTTP_HOST'].'</li>';
	$body .= '<li style="line-height:25px;">���ӵ�ǰһ��ҳ��:'.$_SERVER['HTTP_REFERER'].'</li>';
	$body .= '<li style="line-height:25px;">�û���Ϣ:'.$_SERVER['HTTP_USER_AGENT'].'</li>';
	$body .= '</ol>';
	$body .= '</div>';
	//----�����ʼ������ļ�
	include_once ZCMS_ROOT.'/data/include/email_config.php';
	if ($error_push == 1)
	{
		$email['mail_server'] = $mail_server;
		$email['mail_port'] = $mail_port;
		$email['mail_from'] = $mail_from;
		$email['mail_auth'] = $mail_auth;
		$email['mail_user'] = $mail_user;
		$email['mail_password'] = $mail_password;
		email($email,$webname.'������Ϣ',$body,$mail_to);
	}
	$tpl->LoadTemplate(ZCMS_ROOT.'/zcms/admin/template/admin/404.html');
	$tpl->Display();
	exit;
}

?>