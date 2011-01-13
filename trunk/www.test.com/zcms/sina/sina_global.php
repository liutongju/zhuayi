<?php
/**
 * admin_menu.php     ZCMS 后台文章管理
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-28
 * @author       zhuayi
 * @QQ			 2179942
 */

/* 验证登录 */
verify_admin('admin_username');
/* 设置页面内部菜单  */




include ZCMS_ROOT.'/zcms/sina/class/snoopy.class.php';
$snoopy = new Snoopy();

/* 来源地址 */
$snoopy->referer = 'http://login.sina.com.cn/signup/signup.php?entry=sso';

/* 模拟浏览器头*/
$snoopy->agent = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.11 (KHTML, like Gecko) Chrome/9.0.570.0 Safari/534.11';
/* 注册地址 */
$url = 'http://login.sina.com.cn/signup/signup1.php';

/* 验证码地址 */
$code_url = 'http://login.sina.com.cn/cgi/pin.php?r=62843531';

/* 省份地区 */
$region = array('34','11','50','35','62','44','45','52','46','13','23','41','42','43','15','32','36','22','21','64','63','14','37','31','51','12','54','65','53','33','61','71','81','82','400','100');
/* 载入新浪微博操作类 */
include ZCMS_ROOT.'/zcms/sina/class/sina.operate.php';

/* 载入异常处理 */
include ZCMS_ROOT.'/zcms/sina/class/exception.class.php';

/* 截取 */
function str_substr($start, $end, $str)
{
	$temp = explode($start, $str, 2);
	$content = explode($end, $temp[1], 2);
	return $content[0];
}

/* 查询当前登录用户所在组 */
$admin = $query->one_array("select b.id from ".T."admin as a left join ".T."admin_group as b on a.gid = b.id where a.username = '".ret_cookie('admin_username')."'");
if ($admin['id'] != 2)
{
	$my = ' and myid='.ret_cookie('admin_userid');
}

/* 模拟规则 */
$task = array(
				array('帐号登录','/index.php?m=sina&c=task_login&a=init','/index.php?m=sina&c=login&a=init&act=1'),
				array('裸号遮羞','/index.php?m=sina&c=task_life&a=init','/index.php?m=sina&c=life&a=init&act=1'),
				array('群发微博','/index.php?m=sina&c=task_t&a=init','/index.php?m=sina&c=t_info&a=init'),
			 );
$skin = array('skin_060','skin_118','skin_052','skin_053','skin_054','skin_058','skin_059','skin_116','skin_117','skin_114','skin_112','skin_234','skin_046','skin_050','skin_053','skin_054','skin_234','skin_035','skin_046','skin_005','skin_018','skin_001','skin_002','skin_003','skin_004','skin_008','skin_009','skin_118','skin_052','skin_117','skin_033','skin_037','skin_040','skin_044','skin_047','skin_048','skin_007','skin_017','skin_019','skin_006','skin_011','skin_058','skin_059','skin_032','skin_034','skin_036','skin_038','skin_039','skin_042','skin_043','skin_045','skin_049','skin_050','skin_116','skin_114','skin_113','skin_051','skin_112','skin_111','skin_021','skin_023','skin_022','skin_015','skin_060','skin_061');
?>