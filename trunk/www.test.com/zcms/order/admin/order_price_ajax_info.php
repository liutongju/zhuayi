<?php
/**
 * admin_edit.php     ZCMS ���Ķ����۸�
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-8
 * @author       zhuayi  
 * @QQ			 2179942
 */

if (empty($_POST['id']))
{
	exit('���ݴ���,����ϵ����Ա..');
}
//------���¶������ͷ�ʽ�ͷ�������
$query->query("update ".T."order set price='".$_POST['price']."'where id =".$_POST['id']);

$query->query("insert into ".T."order_log(oid,log,uid,dtime)values('".$_POST['id']."','�޸Ķ����۸�----��".$_POST['price']."Ԫ','".ret_cookie('admin_userid')."','".time()."')");
echo '1';
exit;
?>