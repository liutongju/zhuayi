<?php

/* �Զ�����ܺ��� */
function mymd5($str)
{

	$str = base64_encode(md5($str));
	return md5($str);
}

?>