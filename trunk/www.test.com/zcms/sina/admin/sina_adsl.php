<?php
/**
 * admin_index.php     ZCMS 后台菜单列表
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi
 * @QQ			 2179942
 */
$adsl = exec("E:\\web\adsl.bat");
$snoopy->fetch('http://www.ip138.com/ip2city.asp');
$reset = $snoopy->results;
set_cookie('ip',str_substr('<center>您的IP地址是：[','] </center>',$reset));
if ($_REQUEST['act'] == 1)
{
	echo '<script type="text/javascript">
	$(function(){
		tb_show(null,\''.$weburl.'/index.php?m=sina&c=reg&height=300&a=init\',false)
	})
	</script>';
	echo $adsl;
	exit;
}
showmsg('IP更换成功.',ret_cookie('backurl'));
exit;
?>