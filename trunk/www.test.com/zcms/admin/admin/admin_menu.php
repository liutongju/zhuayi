<?php
/**
 * admin_info.php     ZCMS �޸Ļ���ӹ���Ա
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

$admin_userid = ret_cookie('admin_userid');
if (!empty($admin_userid))
{
	$info = $query->one_array("select a.*,b.* from ".T."admin as a left join ".T."admin_group as b on a.gid=b.id where a.id ='".$admin_userid."'");
}
else
{
	showmsg('��û�е�¼�����ߵ�¼��ʱ','/zcms.php');
}
?>