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

//-----���ҳ���ַ���
//header('Content-type: text/html; charset=utf-8');

if (empty($_REQUEST['product_num']))
{
	exit('���ݴ���..');
}
$info = $query->one_array("select product_num,title,price from ".T."direct where product_num =".$_REQUEST['product_num']);
$info['title'] = urlencode(iconv('gb2312','utf-8',$info['title']));
$info['title'] =$info['title'];   
$info['order_num'] = $_REQUEST['product_num'].substr(time(),4,10);   
echo json_encode($info);
exit;

?>