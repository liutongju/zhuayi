<?php
/**
 * admin_global.php     ZCMS ��̨�������,
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */


/* �ж����� */

$reset = $query->query("select * from ".T."record order by orders desc");
while ($row = $query->fetch_array($reset))
{
	$list[$row['orders']] = $row;
}

?>