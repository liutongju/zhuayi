<?php
/**
 * index.php     ZCMS ����ļ�
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
	echo '�����ɹ�';
}
else
{
	echo $return['error'];
}
exit;

?>