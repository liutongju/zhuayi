<?php
/**
 * admin_info.php     ZCMS ��̨������Ŀ������
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
exit;
?>