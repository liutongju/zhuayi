<?php



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
$nick = $query->one_array("select * from ".T."sina_nick where user = 0 limit 0 ,1");

/* 随机一个昵称 */
$info['nick'] = $nick['nick'];


/* 去查询昵称被注册了没 */
$t = new sina();
$info['nick'] = $t->nickname($info['nick']);

/* 更新昵称表已用 */
$query->query("update ".T."sina_nick set nick ='".$info['nick']."', user = 1 where id =".$nick['id']);
//$snoopy->fetchform;
//echo $snoopy->results;
//exit;
?>