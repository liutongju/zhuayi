<?php
/**
 * admin_edit.php     ZCMS ֱͶ��Ӻͱ༭
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');

if (!empty($_POST['id']))
{
	$search = ' and id <>'.$_POST['id'];
}
$info = $query->one_array("select * from ".T."direct where id >0".$search." order by product_num desc");
$info['product_num'] = $info['product_num']+1;
echo $info['product_num'];
exit;
?>