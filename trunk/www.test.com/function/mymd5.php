<?php

/* 自定义加密函数 */
function mymd5($str)
{

	$str = base64_encode(md5($str));
	return md5($str);
}

?>