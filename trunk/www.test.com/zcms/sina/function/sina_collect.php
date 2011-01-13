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


 /* 采集网易微博 */
 function collect_163()
 {
	global $snoopy;
	$snoopy->fetch('http://t.163.com/statuses/seelist.json?rnd=1294670142799');
	//echo '<pre>';
	$return = json_decode($snoopy->results,true);
	$return = $return[array_rand($return)];
	//print_r($return);
	$return = str_replace('腾讯微博','新浪微博',siconv($return['text']));
	return array('body'=>$return,'pic'=>$pic);
 }

/* 采集搜狐微博 */
function collect_sohu()
{
	global $snoopy,$query;
	$snoopy->fetch('http://t.sohu.com/live');
	//echo '<pre>';
	$snoopy->results = str_substr('<div class="twis" id="twitter_container">','<!--E 用户列表(inc)-->',$snoopy->results);
	//preg_match_all('/<q class="ugc ugc1">(.*)<\/q><\/p>/i',$snoopy->results,$return);
	preg_match_all('/<div class="twi" id="(.*)_con">(.*)<b class="bc"><\/b>/i',$snoopy->results,$return);
	$return = str_replace('搜狐微博','新浪微博',$return[0][array_rand($return[0])]);


	/* 图片 */
	preg_match_all('/path:\'(.*)\',ele:this/',$return,$pic);
	$pic = $pic[1][0];
	/* 转发内容 */
	preg_match_all('/<q class="ugc ugc2">(.*)<\/q><\/p>/',$return,$zhuanfa);
	$content = $zhuanfa[1][0];

	if (empty($content))
	{
		preg_match_all('/<q class="ugc ugc1">(.*)<\/q><\/p>/',$return,$body);
		$content = $body[1][0];
	}
	//if (!empty($zhuanfa[1]))
	//$return =  $zhuanfa;

	preg_match_all('|<i class="at">(.*)<\/a><\/b>|U',$content,$ait);
	$content = strip_tags($content);
	//echo '<pre>';
	//print_r($ait[1]);
	foreach ($ait[1] as $key=>$val)
	{
		$val = strip_tags($val);
		$info = $query->one_array("select * from ".T."sina_account where nick<>'' order by rand() limit 0 ,1");
		$content = str_replace($val,'@'.$info['nick'],$content);
	}
	return array('body'=>$content,'pic'=>$pic);
}

function collect_qq()
{
	global $snoopy,$query;
	$snoopy->fetch('http://t.qq.com/p/news');
	$snoopy->results = str_substr('<ul id="talkList" class="LC">','</ul>',$snoopy->results);
	$snoopy->results = trim(str_replace('	','',preg_replace('/\r|\n|　/', '',$snoopy->results)));

	preg_match_all('|<div class="userPic">(.*)<\/div><\/li>|U',$snoopy->results,$return);
	$key  = rand(0,count($return[0]));

	$return = siconv(str_replace('腾讯微博','新浪微博',$return[0][$key]));

	/* 转发内容 */
	preg_match_all('|<div class="msgBox"><div class="msgCnt"><strong>(.*)<\/strong>(.*)<\/div><div class="pubInfo">|U',$return,$zhuanfa);
	$content = $zhuanfa[2][0];

	if (empty($content))
	{

		preg_match_all('|</div><div class="msgCnt">(.*)<\/div>|U',$return,$body);
		$content = $body[1][0];
	}

	/* 图片 */
	preg_match_all('/crs="(.*)"><\/a><\/div>/i',$return,$pic);
	$pic = $pic[1][0];

	$content =  strip_tags($content);
	return array('body'=>$content,'pic'=>$pic);
}

?>