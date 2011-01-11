<?php
/**
 * index.php     ZCMS 裸体遮羞
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */

ignore_user_abort();
set_time_limit(0);
$info = $query->one_array("select * from ".T."sina_account where id = ".$_REQUEST['id']);

$t = new sina();
$t->username = $info['username'];
$t->password = $info['pass'];

/* 虚拟一个手机号码 */
$mobile = $query->one_array("select * from ".T."sina_mobile order by rand() limit 0,1");
$info['mobile'] = $mobile['mobile'];

/* 虚拟一个生日 */
$info['birthday'] = date("Y-m-d",rand(316713600,695404800));

/* 初始化模版 */
$skin = array('skin_060','skin_118','skin_052','skin_053','skin_054','skin_058','skin_059','skin_116','skin_117','skin_114','skin_112','skin_234','skin_046','skin_050','skin_053','skin_054','skin_234','skin_035','skin_046','skin_005','skin_018','skin_001','skin_002','skin_003','skin_004','skin_008','skin_009','skin_118','skin_052','skin_117','skin_033','skin_037','skin_040','skin_044','skin_047','skin_048','skin_007','skin_017','skin_019','skin_006','skin_011','skin_058','skin_059','skin_032','skin_034','skin_036','skin_038','skin_039','skin_042','skin_043','skin_045','skin_049','skin_050','skin_116','skin_114','skin_113','skin_051','skin_112','skin_111','skin_021','skin_023','skin_022','skin_015','skin_060','skin_061');
$info['skin'] = $skin[array_rand($skin)];

/* 初始头像 */
$litpic = $query->one_array("select * from ".T."sina_face order by rand()");
$info['face'] = $litpic['face'];

/* 随机个人签名 */
$sign = $query->one_array("select * from ".T."sina_sign order by rand() limit 0,1");
$info['sign'] = $sign['sign'];

/* 虚拟一个QQ号 */
$info['qq'] = rand(589681,384919184);
/* 设置地区 */
$info['province'] = explode(',',$info['province']);
$info['city'] = $info['province'][1];
$info['province'] = $info['province'][0];

/* 初始标签 */
$reset = $query->query("select title from ".T."sina_tags order by rand() limit 0 , ".rand(5,10));
while ($row = $query->fetch_array($reset))
{
	$tags[] = $row['title'];
}
$info['account_tags'] = implode(' ',$tags);

/* 初始关注 */
$reset = $query->query("select uid from ".T."sina_account where uid<>'' and id <>".$_REQUEST['id']." order by rand() limit 0 ,".rand(20,30));
while ($row = $query->fetch_array($reset))
{
	$uid[] = $row['uid'];
}
$info['uid'] = implode(',',$uid);

/* 去登录*/
$reset = $t->login();

if ($reset['code'] == '-1')
{
	echo '登录失败..剩下步助停止<br>';
	exit;
}

/* 写入COOKIE */
$query->query("update ".T."sina_account set cookie ='".$reset['cookie']."',uid='".$reset['uid']."' where id=".$_REQUEST['id']);


sleep($_GET['login_time']);

$t->cookies =  $reset['cookie'];
/* 激活 */
if ($info['status'] != 1)
{
	/* 激活帐号 */
	$return = $t->activation($info);
	/* 激活需要验证码 暂时停止开发 */
}
sleep($_GET['activ_time']);


$return = $t->face_upload(ZCMS_ROOT.$info['face']);
if ($return == 1)
{
	echo '头像上传成功<br>';
}
else
{
	echo '头像上传失败:<font color=red>'.$return['error'].'</font><br>';
}

sleep($_GET['face_time']);


$return = $t->skin($info['skin']);
if ($return == '1')
{
	echo '模版更换成功<br>';
}
else
{
	echo '模版更换失败:<font color=red>'.$return['error'].'</font><br>';
}
sleep($_GET['skin_time']);

$return = $t->myinfo($info);
if ($return == '1')
{
	echo '虚拟资料成功<br>';
}
else
{
	echo '虚拟资料失败:<font color=red>'.$return['error'].'</font><br>';
}
sleep($_GET['info_time']);


$return = $t->tags($info['account_tags']);
if ($return == '1')
{
	echo '更新标签成功<br>';
}
else
{
	echo '更新标签失败:<font color=red>'.$return['error'].'</font><br>';
}
sleep($_GET['tags_time']);


$reset = $t->attention($info['uid'],$reset['uid']);
if ($reset == '1')
{
	$uid = explode(',',$info['uid']);
	foreach ($uid as $val)
	{
		$query->query("insert into ".T."sina_attention (myid,uid)values('".$_REQUEST['id']."','".$val."')");
	}
	echo '关注成功<br>';
}
else
{
	echo '关注失败:<font color=red>'.$reset['error'].'</font><br>';
}
sleep($_GET['attention_time']);
/* 初始微博 */

$body = $query->arrays("select body from ".T."sina_content order by rand() limit 0,2");
foreach ($body as $val)
{
	$return = $t->t_info($val['body'],$val['pic'],$reset['uid']);
	if ($return == '1')
	{
		/* 设置该信息已发送 */
		echo '发布微博成功<br>';
	}
	else
	{
		echo '发布微博失败:<font color=red>'.$return['error'].'</font><br>';
	}
	sleep($_GET['info_time']);
}
$query->save("sina_account",$info,' id ='.$_REQUEST['id']);
exit;
?>