<?php
/**
 * admin_index.php     ZCMS ��̨�������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

/* ��ѯ��ǰ��¼����Ա��Ϣ */
$info = $query->one_array("select * from ".T."admin where id ='".ret_cookie('admin_userid')."'");
?>