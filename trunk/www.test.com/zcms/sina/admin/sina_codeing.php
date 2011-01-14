<?php
/**
 * admin_index.php     ZCMS 后台菜单列表
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-5
 * @author       zhuayi
 * @QQ			 2179942
 */
/* 验证登录 */
$code_maxnum = $query->maxnum("select count(*) from ".T."sina_account where id>0 ".$my);
$day_maxnum = $query->maxnum("select count(*) from ".T."sina_account where dtime > ".strtotime(date("Y-m-d 00:00:00")).$my);
$tips = "您现在当前登录帐号是 <font style='font-size:16px;color:#CC0000;font-family:Arial, Helvetica, sans-serif;font-weight:bold'>".ret_cookie('admin_username')."</font> ,
您一共打了  <font style='font-size:16px;color:#CC0000;font-family:Arial, Helvetica, sans-serif;font-weight:bold'>".$code_maxnum."</font> 个
今天打了   <font style='font-size:16px;color:#CC0000;font-family:Arial, Helvetica, sans-serif;font-weight:bold'>".$day_maxnum.'</font> 个
离2000W元还差 <font style="font-size:16px;color:#CC0000;font-family:Arial, Helvetica, sans-serif;font-weight:bold">'.(100000-$code_maxnum).'</font>个
当前登录IP：<font style="font-size:16px;color:#CC0000;font-family:Arial, Helvetica, sans-serif;font-weight:bold">'.ret_cookie('ip').'</font>';
verify_admin('admin_username');

$code_ip = ret_cookie('code_ip');
$code_num = ret_cookie('code_num');

/* 查询还有多少个没有激活 */
$att = $query->one_array("select * from ".T."sina_account where status = 0  order by rand() ");
if (!empty($att['id']) && $code_num % 4 == 0)
{
	/* 激活 */
	$code_pic = '/index.php?m=sina&c=activation&act=code&a=init&id='.$att['id'].'&time=';
	$sub_url = '?m=sina&c=activation&a=init&act=1';

}
else
{
	//header("Location: ".$weburl.'/index.php?m=sina&c=adsl&height=300&a=init&act=1');
	$code_pic = '/index.php?m=sina&c=code&a=init&time=';
	$sub_url = '/index.php?m=sina&c=reg_info&a=init';
	/* 生成随机邮箱 */
	$sina_email = 'a,b,c,d,e,f,g,h,i,g,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9';
	$sina_email = explode(',',$sina_email);

	for ($i=1;$i<=rand(4,16);$i++)
	{
		$info['username'] .= $sina_email[array_rand($sina_email)];
	}
	//$info['username'] .= '@sina.cn';

	/* 固定一个初始密码 */
	for ($i=1;$i<=rand(6,10);$i++)
	{
		$info['pass'] .= $sina_email[array_rand($sina_email)];
	}
	/* 获取表单 */
	//$snoopy->fetchform($url);


	/* 随机否与该昵称一个出生年份 */
	$year = date("Y",rand(316713600,695404800));

	/* 随机赋予一个名称 */
	$nick = $query->one_array("select * from ".T."sina_nick where user = 0   limit 0 ,1");

	/* 随机一个昵称 */
	$info['nick'] = $nick['nick'];


	/* 去查询昵称被注册了没 */
	$t = new sina();
	$info['nick'] = $t->nickname($info['nick']);

	/* 更新昵称表已用 */
	$query->query("update ".T."sina_nick set nick ='".$info['nick']."', user = 1 where id =".$nick['id']);
}

if ($code_num % 3 == 0 && $code_num!=0)
{
	/* 更换IP */
	header("Location: ".$weburl.'/index.php?m=sina&c=adsl&height=300&a=init&act=1');
}
?>