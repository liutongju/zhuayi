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
/*
$snoopy->fetch('http://www.proxycn.com/html_proxy/countryTT-1.html');
$reset = $snoopy->results;
$reset = str_substr('ID','��һҳ',$reset);

//echo $reset = str_substr('onDblClick="clip(\'','\')',$reset);
preg_match_all('/onDblClick="clip(\(.*)\'\)/',$reset,$ip);

$ip = $ip[0][array_rand($ip[0])];
$ip = str_replace('onDblClick="clip(\'','',$ip);
$ip = str_replace('\');alert(\'�ѿ�����������!\')','',$ip);
$ip = explode(':',$ip);


*/

set_cookie('agent_ip',$_POST['agent_ip']);
set_cookie('agent_port',$_POST['agent_port']);
showmsg('�����ɹ�',ret_cookie('backurl'));
exit;
?>