<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $seo['seo_title']; ?> - <?php echo $webname; ?></title>
<link href="<?php echo $path; ?>style/top.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo $path; ?>js/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta name="author" content="Zcms">
<meta name="keywords" content="<?php echo $seo['seo_keywords']; ?>">
<meta name="description" content="<?php echo $seo['seo_description']; ?>">
<link rel="shortcut icon" href="/favicon.ico" >
<script>
$(function(){
	$(".search").click(function(){
		window.location = '/'+$("#srarch_table").val()+'/search/title/'+$("#search_title").val();
		return false;
	})
})
</script>
</head>
<body>
<div class="w_auto border-bottom top">
	<div class="w_960 overflow">
		<span class="float_left left">
			<?php echo dtime(time(),"Y年m月d日G:i:s"); ?>　<?php echo dtime(time(),'5'); ?>		</span>
		<span class="float_right right">
			<a href="/index.php?m=article&c=sitemap">网站地图</a> | 
			<a href="/index.php?m=article&c=tags">Tags标签</a> | 
			<a href='javascript:' onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $weburl; ?>');">【设为首页】</a> | 
			<a href="javascript:window.external.addFavorite('<?php echo $weburl; ?>','<?php echo $webname; ?>');">【加入收藏】</a>		</span>
	</div>
</div>
<div class="w_960 overflow top_logo">
	<a href="<?php echo $weburl; ?>" title="<?php echo $webname; ?>"><h2 class="float_left"><?php echo $weburl; ?> - <?php echo $webname; ?></h2></a>
	<div class="banner float_right">
		<img src="<?php echo $path; ?>images/shan/banner.jpg"/>
	</div>
</div>
<div class="w_960 nav zcms overflow">
	<a href="/">首 页</a>
	<?php
$atts = array();
$atts['tagname'] = 'article_class_list';
$atts['parent_id'] = '0';
$atts['nav'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
	<a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['classname']; ?></a>
	<?php
}
}
?>
</div>
<div class="nav_search overflow">
<form id="">
	<div class="float_left">
		<label>
			<input type="text" name="title" id="search_title" class="text" value="<?php
$atts = array();
$atts['tagname'] = 'search_list';
$atts['orders'] = '1';
$atts['limit'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
 echo $fields['title']; 
}
}
?>"/>
		</label>
		<label>
			<input type="hidden" name="srarch_table" id="srarch_table" value="article"/>
			<input type="submit" class="search zcms" value="搜索"/>
		</label>
	</div>
	<div class="float_left tags">
		<b>热们搜索：</b>
		<?php
$atts = array();
$atts['tagname'] = 'search_list';
$atts['orders'] = '1';
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
?>
		<a href="/article/search/title/<?php echo $fields['title']; ?>"><?php echo $fields['title']; ?></a>
		<?php
}
}
?>
	</div>
</form>
</div>