<?php
/**
 * admin_logout.php     ZCMS �˳���̨�������
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */


set_cookie('admin_username','');
showmsg('�˳��ɹ�','/index.php?m=admin&c=login&a=init');
?>