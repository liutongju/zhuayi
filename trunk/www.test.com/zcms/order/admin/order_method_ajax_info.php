<?php
/**
 * admin_edit.php     ZCMS �������ͷ�ʽ�ͷ�������
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
}$method = $query->one_array("select * from ".T."order_method where id ='".$_POST['method']."'");
if (empty($method['title']))
{
	exit('���ݴ���,����ϵ����Ա..');
}
//------���¶������ͷ�ʽ�ͷ�������
$query->query("update ".T."order set method='".$_POST['method']."', fhnum ='".$_POST['method_num']."',fh_status = 0,fhtime='".time()."' where id =".$_POST['id']);

$query->query("insert into ".T."order_log(oid,log,uid,dtime)values('".$_POST['id']."','�޸����ͷ�ʽ�ͷ�����----".$method['title'].'--'.$_POST['method_num']."','".ret_cookie('admin_userid')."','".time()."')");
echo '1';
exit;
?>