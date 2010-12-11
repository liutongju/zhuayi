<?php
/**
 * admin_info.php     ZCMS 后台文章栏目入库操作
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

$_POST['sms'] = explode(';',$_POST['sms']);
$_POST['body'] = siconv($_POST['body']);
echo $sms->sendSMS($_POST['sms'],$_POST['body']);
$query->query("update ".T."sms_statistics set sms_num=sms_num+1");
exit;
?>