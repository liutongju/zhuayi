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

$litpic = $query->one_array("select * from ".T."sina_face order by rand()");

$return = $t->face_upload(ZCMS_ROOT.$litpic['face']);
if ($return == 1)
{
	$query->query("update ".T."sina_account set litpic = '".$litpic['face']."' where id=".$_REQUEST['id']);
	echo '�ϴ��ɹ�';
}
else
{
	echo $return['error'];
}
exit;

?>