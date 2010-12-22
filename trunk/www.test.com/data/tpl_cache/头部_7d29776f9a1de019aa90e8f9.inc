<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><!doctype html public "-//w3c//dtd xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="mshtml 6.00.2900.6036" name=generator>
<meta http-equiv="content-type" content="text/html; charset=gb2312" />
<title><?php echo $seo['seo_title']; ?> - <?php echo $webname; ?></title>
<meta http-equiv="content-type" content="text/html; charset=gb2312" />
<meta http-equiv="x-ua-compatible" content="ie=7">
<meta name="author" content="zcms">
<meta name="keywords" content="<?php echo $seo['seo_keywords']; ?>">
<meta name="description" content="<?php echo $seo['seo_description']; ?>">
<script type="text/javascript" src="<?php echo $path; ?>/style/jquery-1.4.2.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>/style/changeskin.js"></script>
<link href="<?php echo $path; ?>/style/skin_homeblue.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $path; ?>/style/skin_blue.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $path; ?>/style/g.js" type=text/javascript></script>
<script language="javascript"> 
<!--屏蔽js错误  
function killerrors() { 
return true; 
} 
window.onerror = killerrors; 
//--> 
</script> 
</head>
<body>
<!--顶部工具栏-->
<!--顶部工具栏结束-->

<div id="headsite">
   <!-- logo start -->
   <div class="tlogo">
		<a href="<?php echo $weburl; ?>" title="<?php echo $webname; ?>"><img alt="<?php echo $webname; ?>" src="<?php echo $path; ?>/style/logo1.gif" border=0></a>
   </div>
   <!-- logo end -->
   <!-- banner 468 60广告 start -->
   <div class="head_banner">
       <center>
           
       </center>
   </div>
   <!-- logo end -->
</div>
   
<div id="nav">
   <!-- 导航 start -->
   <div id="navlink">
      <ul>
          <li class=active><a href='/'><span>首   页</span></a></li>
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
          <li><a href="<?php echo $fields['url']; ?>" target="_blank"><?php echo $fields['classname']; ?></a></li>
          <?php
}
}
?>
      </ul>
   </div>
   <!-- 导航 end -->
   <div id="navsub">
      <div class="search">
         <div class="scbox">
            <!-- search begin -->
            <form name="formsearch" action="/index.php">
            <input type="text" class="sckey" name="title" id="search_title" value="<?php
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
			<input type="hidden" name="m" value="article">
			<input type="hidden" name="c" value="search">
            <input class="scbtn" type="submit" value="搜 索"> 
            </form>
            <!-- search end -->
         </div>
		 <DIV class="schot"><strong>热门搜索：</strong>
                <?php
$atts = array();
$atts['tagname'] = 'search_list';
$atts['orders'] = '6';
$atts['limit'] = '10';
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
         </DIV>
      </div>
      <div class=tags><strong>热门标签：</strong>
                     <?php
$atts = array();
$atts['tagname'] = 'search_list';
$atts['orders'] = '1';
$atts['limit'] = '25';
$atts['start'] = '6';
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
   </div>
</div>