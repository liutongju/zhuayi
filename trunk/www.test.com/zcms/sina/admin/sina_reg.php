<?php



/* ����������� */
$sina_email = 'a,b,c,d,e,f,g,h,i,g,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0,1,2,3,4,5,6,7,8,9';
$sina_email = explode(',',$sina_email);

for ($i=1;$i<=rand(4,16);$i++)
{
	$info['username'] .= $sina_email[array_rand($sina_email)];
}
//$info['username'] .= '@sina.cn';

/* �̶�һ����ʼ���� */
for ($i=1;$i<=rand(6,10);$i++)
{
	$info['pass'] .= $sina_email[array_rand($sina_email)];
}
/* ��ȡ�� */
//$snoopy->fetchform($url);


/* ���������ǳ�һ��������� */
$year = date("Y",rand(316713600,695404800));

/* �������һ������ */
$nick = $query->one_array("select * from ".T."sina_nick where user = 0 limit 0 ,1");

/* ���һ���ǳ� */
$info['nick'] = $nick['nick'];


/* ȥ��ѯ�ǳƱ�ע����û */
$t = new sina();
$info['nick'] = $t->nickname($info['nick']);

/* �����ǳƱ����� */
$query->query("update ".T."sina_nick set nick ='".$info['nick']."', user = 1 where id =".$nick['id']);
//$snoopy->fetchform;
//echo $snoopy->results;
//exit;
?>