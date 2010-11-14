<?php
/** * 判断是否登录 * @key COOKIE键值 */function verify_admin($key){
	$retu = ret_cookie($key);
	if (empty($retu))	{		showmsg('您还没有登录，或者登录超时','/index.php?m=admin&c=login&a=init');	}}
?>