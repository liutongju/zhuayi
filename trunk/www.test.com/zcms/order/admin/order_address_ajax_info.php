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
$_POST['consignee'] = serialize ($_POST['consignee']);
$query->query("update ".T."order set consignee='".$_POST['consignee']."'where id =".$_POST['id']);

$query->query("insert into ".T."order_log(oid,log,uid,dtime)values('".$_POST['id']."','�ջ�����Ϣ','".ret_cookie('admin_userid')."','".time()."')");
showmsg('��ϲ��,�����ɹ�','/index.php?m=order&c=show&a=init&id='.$_POST['id']);
exit;
?>