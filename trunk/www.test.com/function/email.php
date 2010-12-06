<?php
/*---------�ʼ�����--------*/
function email($info,$title='�����ʼ�',$body='����һ������ʼ�',$email)
{
	/* �����ʼ������� */
	include_once ZCMS_ROOT."/class/phpmail/class.phpmailer.php"; 
	$mail             = new PHPMailer();
	$mail->SetLanguage('zn');
	$mail->IsSMTP(); /*  telling the class to use SMTP */
	$mail->SMTPDebug  = 0;                     /*  enables SMTP debug information (for testing) */
	$mail->SMTPAuth   = true;                  /* enable SMTP authentication */
	if ($info['mail_auth']==1)
	$mail->SMTPSecure = "ssl";                 /* sets the prefix to the servier */
	$mail->Port       = $info['mail_port'];                   /* set the SMTP port for the GMAIL server */
	$mail->Host       = $info['mail_server'];     /* sets GMAIL as the SMTP server */
	$mail->Username   = $info['mail_user'];   /* GMAIL username */
	$mail->Password   = $info['mail_password'];            /* GMAIL password */
	$mail->CharSet    = "gbk"; /* �ַ����� */
	$mail->Encoding = "base64"; /* ���뷽ʽ */
	$mail->SetFrom($info['mail_from'],$info['mail_from']);
	$mail->Subject    = $title;
	$mail->MsgHTML(stripcslashes($body));
	$mail->AddAddress($email);
	if(!$mail->Send()) {
	  return $mail->ErrorInfo;
	} else {
	  return "ok";
	}
}
?>