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
/*
echo urldecode('uid=1640023754%2C1849001822%2C1736042541%2C1310393894%2C1133802607%2C1400913802%2C1729853157%2C1677720444%2C1670636083%2C1806762625%2C1648997127%2C1200139367%2C1619994554%2C1825660713%2C1007343817%2C1732509302%2C1768340073%2C1665014522%2C1878321791%2C1639127253%2C1813023245%2C1192277047%2C1732950433%2C1495169251&fromuid=1905767264');
exit;
echo urldecode('tag=%E7%BD%91%E7%BB%9C%2C%E7%A8%8B%E5%BA%8F%E5%91%98');
exit;
//发微博
/mblog/publish.php?rnd=0.07724724591070708
发微博传图
/interface/pic_upload.php?marks=1&markstr=t.sina.com.cn%2F1905767264&s=rdxt&app=miniblog&cb=http://t.sina.com.cn/upimgback.html
echo siconv(urldecode('content=%E6%88%91%E6%9C%80%E7%88%B1%E7%9A%84%E4%BA%BA%EF%BC%8C%E4%B8%8D%E7%88%B1%E6%88%91&pic=7197b360jw6dd5657tyeoj&styleid=1&retcode='));
exit;
*/
//echo siconv(urldecode("%E5%9B%9B%E5%8D%81%E5%B2%81%E4%BB%A5%E5%89%8D%EF%BC%8C%E6%88%91%E8%AF%BB%E9%81%8D%E4%BA%86%E8%83%BD%E6%89%BE%E5%88%B0%E7%9A%84%E6%89%80%E6%9C%89%E4%B8%96%E7%95%8C%E4%BC%A0%E5%AA%92%E5%87%BA%E7%89%88%E5%A8%B1%E4%B9%90%E4%B8%9A%E4%BA%BA%E7%89%A9%E7%9A%84%E4%BC%A0%E8%AE%B0%EF%BC%8C%E5%9B%9B%E5%8D%81%E5%B2%81%E4%BB%A5%E5%90%8E%E5%9F%BA%E6%9C%AC%E4%B8%8D%E5%86%8D%E8%AF%BB%E4%BA%86%E3%80%82%E5%8E%9F%E5%9B%A0%EF%BC%8C%E4%B8%80%EF%BC%8C%E7%A4%BE%E4%BC%9A%E7%8E%AF%E5%A2%83%E7%9A%84%E5%AF%B9%E6%AF%94%E4%BB%A4%E4%BA%BA%E6%B0%94%E9%A6%81%EF%BC%8C%E4%B8%8D%E5%A6%82%E4%B8%8D%E7%9C%8B%EF%BC%9B%E4%BA%8C%EF%BC%8C%E5%9B%9B%E5%8D%81%E5%B2%81%E4%BB%A5%E5%90%8E%E5%86%8D%E4%B8%8D%E5%81%9A%E8%87%AA%E5%B7%B1%EF%BC%8C%E4%B8%80%E8%BE%88%E5%AD%90%E5%B0%B1%E6%9D%A5%E4%B8%8D%E5%8F%8A%E4%BA%86%E3%80%82',0,this,'num_2211101091512412612','蔡文胜','%E5%90%8C%E6%84%9F%EF%BC%9A%E5%9B%9B%E5%8D%81%E5%B2%81%E4%BB%A5%E5%90%8E%E5%86%8D%E4%B8%8D%E5%81%9A%E8%87%AA%E5%B7%B1%EF%BC%8C%E4%B8%80%E8%BE%88%E5%AD%90%E5%B0%B1%E6%9D%A5%E4%B8%8D%E5%8F%8A%E4%BA%86%E3%80%82"));
//exit;
//$snoopy->offsiteok = false;
//$snoopy->fetch('http://t.sohu.com/url.jsp?id=3ePU');
//echo '<pre>';
//print_r($snoopy);
//exit;

$t = new sina();
echo $t->test();
exit;
?>