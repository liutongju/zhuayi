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

include 'api_global.php';

$skin = $skin[array_rand($skin)];
$return = $t->skin($skin);
if ($return == '1')
{
	$query->query("update ".T."sina_account set skin='".$skin."' where id=".$_REQUEST['id']);
	echo '更换成功';
}
else
{
	echo $return['error'];
}
exit;

?>