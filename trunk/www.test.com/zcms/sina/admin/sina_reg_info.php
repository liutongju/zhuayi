<?php
/**
 * index.php     ZCMS 入口文件
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */


$snoopy->proxy_host = ret_cookie('agent_ip');
$snoopy->proxy_port = ret_cookie('agent_port');

/* 开始注册 模拟浏览器头*/

$snoopy->cookies["ULOGIN_IMG"] = ret_cookie('sina_code');

/* 开始模拟表单 */
$form['act'] =2;
$form['entry'] ='sso';
$form['returnURL'] ='';
$form['username'] = $_POST['username'];
$form['corp'] = '';
$form['mcheck'] = '';
$form['referer'] = '294646374f03c04109139b1f8a9c7af9http://login.sina.com.cn/signup/signup.php?entry=s';
$form['from'] = 'regmail';
$form['user_name'] = $_POST['username'];
$form['mailType'] = 'cn';
$form['notifyType'] = '4';
$form['password'] = $_POST['pass'];
$form['password2'] = $_POST['pass'];
$form['selectQid'] = '其他';
$form['otherQid'] = '7758521';
$form['pwdA'] = '198698';
$form['nick'] = siconv($_POST['nick']);
$form['door'] = trim($_POST['code']);
$form['after'] ='on';
$form['pass'] = $_POST['pass'];
$form['dtime'] = time();
/* 获取IP */
$form['ip'] = ret_cookie();

/* 虚拟一个手机号码 */
$mobile = $query->one_array("select * from ".T."sina_mobile order by rand() limit 0,1");
$form['mobile'] = $mobile['mobile'];


/* 操作员ID */
$form['myid'] = ret_cookie('admin_userid');
/* 根据操作员ID 否与一个分类 */
$cid = $query->one_array("select * from ".T."sina_account_class where aid=".ret_cookie('admin_userid'));
$form['cid'] = $cid['id'];
if (empty($form['cid']))
{
	echo '没有绑定分类,不能注册..';
	exit;
}
/* 随机一个省份 */
$province = $query->one_array("select * from ".T."linkage where parent_id = 1 order by rand() limit 0,1");
$form['province'] = $province['id'];
$province = $query->one_array("select * from ".T."linkage where parent_id = '".$province['id']."' order by rand() limit 0,1");
$form['province'] .= ','.$province['orders'];

/* 随机一个性别 */
$form['gender'] = rand(1,2);

//echo '1103';
//exit;
/* 提交表单 */
$snoopy->submit($url,$form);
$return = $snoopy->results;

if (strpos($return,'验证码输入有误，请重新输入')>0)
{
	echo '-1';
}
elseif (strpos($return,'恭喜您，新浪会员注册成功!')>0)
{
	$form['username'] .= '@sina.cn';

	$t = new sina();
	$t->username = $form['username'];
	$t->password = $form['pass'];
	$reset = $t->login();

	$form['cookie'] = $reset['cookie'];
	$form['uid'] = $reset['uid'];
	/* 写入到数据库 */
	$query->save('sina_account',$form);
	set_cookie('code_num',ret_cookie('code_num')+1);
	echo '1';

}
elseif (strpos($return,'很抱歉！该帐号被抢注，请选择其它帐号')>0)
{
	echo '-2';
}
elseif (strpos($return,'抱歉，我们怀疑您有恶意注册的嫌疑！请稍后再试！')>0)
{
	echo '-3';
}
else
{
	echo $return;
}
exit;



?>