<?php
/**
 * index.php     ZCMS ������֤���ļ�
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */

//header("content-type:image/png\r\n");

$snoopy->proxy_host = ret_cookie('agent_ip');
$snoopy->proxy_port = ret_cookie('agent_port');

/* ---��ȡ��֤�� */
$snoopy->fetch($code_url);

/* ��ȡcookie */
$cookie = $snoopy->headers;
$cookie = str_replace('Set-Cookie: ','',$cookie[3]);
$cookie = explode(';',$cookie);
$cookie = explode('=',$cookie[0]);
set_cookie('sina_code',$cookie[1]);
echo $snoopy->results;
exit;
?>