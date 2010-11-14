<?php

/* 主框架提示信息 * @ title 提示性文字 * @ url   跳转地址
 * @ time  跳转间隔时间
 * @ a     前后台页面 */function showmsg($title='',$url='/',$time=1250,$a='init'){	if ($url == '-1')	{		$url = 'javascript:history.go(-1)';	}	else	{		$url = "window.location.href='".$url."'";	}	//----跳转URL		header("Location: /index.php?m=showmsg&a=".$a."&title=".$title."&url=".base64_encode($url).'&time='.$time); 	exit;}

?>