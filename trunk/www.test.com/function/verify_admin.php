<?php
/** * �ж��Ƿ��¼ * @key COOKIE��ֵ */function verify_admin($key){
	$retu = ret_cookie($key);
	if (empty($retu))	{		showmsg('����û�е�¼�����ߵ�¼��ʱ','/index.php?m=admin&c=login&a=init');	}}
?>