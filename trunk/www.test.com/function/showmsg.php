<?php

/* �������ʾ��Ϣ * @ title ��ʾ������ * @ url   ��ת��ַ
 * @ time  ��ת���ʱ��
 * @ a     ǰ��̨ҳ�� */function showmsg($title='',$url='/',$time=1250,$a='init'){	if ($url == '-1')	{		$url = 'javascript:history.go(-1)';	}	else	{		$url = "window.location.href='".$url."'";	}	//----��תURL		header("Location: /index.php?m=showmsg&a=".$a."&title=".$title."&url=".base64_encode($url).'&time='.$time); 	exit;}

?>