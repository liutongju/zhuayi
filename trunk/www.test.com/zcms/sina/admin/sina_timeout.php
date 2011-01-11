<?php
/**
 * index.php     ZCMS 入口文件
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */
/* -----设置时区  */
date_default_timezone_set('Asia/Shanghai');


$starttime = strtotime(date("Y-m-".(date("d")+1).' '.$_REQUEST['starttime']));
$starttime2  = strtotime(date("Y-m-d ".$_REQUEST['starttime']));
//$hove2 = date("G:i:s",time());
if ( $starttime2 > time())
{
	echo $starttime2 - time();
}
elseif ( $starttime2 == time())
{
	echo '0';
}
else
{
	echo date("Y-m-d G:i:s",$starttime);
}
exit;
?>