<?php
/**
 * admin_info.php     ZCMS 短信发送接口
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

set_time_limit(0);
include_once ZCMS_ROOT.'/zcms/sms/class/include/Client.php';
/*-------------SMS-------------*/
/**
 * 网关地址
 */	
$gwUrl = $service;
/**
 * 序列号,请通过亿美销售人员获取
 */
$serialNumber = $number;
/**
 * 密码,请通过亿美销售人员获取
 */
$password = $password;

/**
 * 登录后所持有的SESSION KEY，即可通过login方法时创建
 */
$sessionKey = '815370';

/**
 * 连接超时时间，单位为秒
 */
$connectTimeOut = $timeout;

/**
 * 远程信息读取超时时间，单位为秒
 */ 
$readTimeOut = 10; 
$proxyhost = false; //----可选，代理服务器地址，默认为 false ,则不使用代理服务器
$proxyport = false; //---可选，代理服务器端口，默认为 false
$proxyusername = false; //---可选，代理服务器用户名，默认为 false
$proxypassword = false; //----可选，代理服务器密码，默认为 false
$sms = new Client($gwUrl,$serialNumber,$password,$sessionKey,$proxyhost,$proxyport,$proxyusername,$proxypassword,$connectTimeOut,$readTimeOut);
/**
 * 发送向服务端的编码，如果本页面的编码为GBK，请使用GBK
 */
$sms->setOutgoingEncoding("GBK");
?>