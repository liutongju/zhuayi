<?php
/**
 * admin_menu.php     ZCMS ��̨�Զ���URL
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');
 
//-------����ҳ���ڲ��˵� 
$menu = array(
			'0'=>array('�����Զ���URL','index'),
			'1'=>array('����Զ���URL','edit','ajax'),
			);
$tips = 'ZCMSϵͳӳ���URL�������Ը�Ŀ¼��/����ͷ��������:<br>';	
$tips .= '�� ����ģʽ:/index.php?m=ģ��&c=����&a=�Ƿ��̨ �磺/index.php?m=admin&c=index&a=init ��ʾ��̨��ҳ a=init ʡ�Բ�д���ʾǰ̨ҳ��<br>';		
$tips .= '�� ���ģʽ:/ģ��/����/a/�Ƿ��̨ �磺/admin/index/a/init/ ��ʾ��̨��ҳ /a/init/ʡ�Բ�д���ʾǰ̨ҳ��<br>';		
$tips .= '�� ģ��ƥ����ָӳ��һ��URL֮���Ƿ�������ӳ���URL��Ӳ���,��http://www.test.com/zcms.php,ӳ�䵽/index.php?m=admin&c=index&a=init ��ʾ��̨ҳ��<br> ';		
$tips .= '�������ģ��ƥ�����߸��Ĳ�������ʶ����http://www.test.com/zcms.php?page=2,����ʶ�����page=2,�ر�ģ��ƥ����ǰURL������Զ����URL����һ���ſ� ';		
?>